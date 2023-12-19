<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ReviewRating;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });
        $produk = Produk::all();

        // Ambil semua nilai review
        $value = ReviewRating::all();
    
        // Kirim data produk dan nilai review ke view
        return view('user.index', [
            'produk' => $produk, // Ubah 'Produk' menjadi 'produk' untuk konsistensi
            'value' => $value, // Kirim data nilai review ke view
            'title' => 'food-menu'
        ]);
    }

    public function home()
    {
        return view('user.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function reviewstore(Request $request){
        $review = new ReviewRating();
        $review->name = $request->name;
        $review->comments= $request->comment;
        $review->star_rating = $request->rating;
        $review->user_id = Auth::user()->id;
        $review->status = "active" ;
        $review->save();
        return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
    }
}
