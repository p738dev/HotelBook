<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    public function book() {
        $book = Book::find(1);
        return view('backend.book.book', compact('book'));
    }

    public function bookUpdate(Request $request) {
        $book_id = $request->id;

        if($request->file('image')) {
            $image = $request->file('image');
            $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1000,1000)->save('upload/book/'.$name_generate);
            $save_url = 'upload/book'.$name_generate;

            Book::findOrFail($book_id)->update([
                'short_title' => $request->short_title,
                'main_title' => $request->main_title,
                'short_desc' => $request->short_desc,
                'link_url' => $request->link_url,
                'image' => $save_url,
                
            ]);

            $notification = [
                'message' => 'Book Updated Successfully',
                'alert-type' => 'success'
            ]; 

            return redirect()->back()->with($notification);
        } else {
            Book::findOrFail($book_id)->update([
                'short_title' => $request->short_title,
                'main_title' => $request->main_title,
                'short_desc' => $request->short_desc,
                'link_url' => $request->link_url,
                
            ]);

            $notification = [
                'message' => 'Book Updated Successfully',
                'alert-type' => 'success'
            ]; 

            return redirect()->back()->with($notification);
        }
    }
}