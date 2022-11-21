<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class SearchController extends Controller
{
	public function __construct(Game $game)
	{
		$this->game = $game;
	}

	public function index(Request $request)
	{
		$search = $request->input('search') !== null ? $request->input('search') : '';
		$query  = $this->game::query()
			->join('bodies', 'quotes.id', '=', 'bodies.quote_id')
			->select('quotes.id', 'quotes.title', 'bodies.body');
		if ($search) {
			$space_conversion = mb_convert_kana($search, 's');
			$word_searches    = preg_split('/[\s,]+/', $space_conversion, -1, PREG_SPLIT_NO_EMPTY);
			foreach($word_searches as $v) {
				$query->where('title', 'LIKE', "%{$v}%")
					->orWhere('body', 'LIKE', "%{$v}%");
			}
		}
		return view('search.index');
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
}
