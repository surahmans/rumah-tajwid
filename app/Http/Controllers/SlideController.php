<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Collective\Html\FormFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use yajra\Datatables\Datatables;

class SlideController extends Controller {

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
	public function update($id, Request $request)
	{
		$article = Article::findOrFail($id);

        $article->update($request->all());

        Session::flash('successMessage', 'Status artikel berhasil diubah.');

        return Redirect::route('admin.slide.index');
	}

    /**
     * Get data of datatables
     */
    public function data()
    {
        $articles = Article::select('*')->orderBy('id', 'desc');

        return Datatables::of($articles)
            ->add_column('actions', '
                @if ($slide)
                    ' . $this->statusForm('{{$id}}', 'Non-aktifkan', 'uk-button-danger', 0) . '
                @else
                    ' . $this->statusForm('{{$id}}', 'Aktifkan', 'uk-button-success', 1) . '
                @endif'
            )
            ->editColumn('status', '
                @if($slide)
                    <div class="uk-badge uk-badge-success">Active</div>
                @else
                    <div class="uk-badge uk-badge-warning">Unactive</div>
                @endif')
            ->make(true);
    }

    /**
     * Create button activate or deactivated slide status
     *
     * @param $id
     * @param $action
     * @param $button
     * @param $value
     * @return string
     */
    public function statusForm($id, $action, $button, $value)
    {
        $html = FormFacade::open(array('url' => 'admin/slide/' . $id, 'method' => 'PATCH', 'class' => 'uk-display-inline uk-margin-left'));
        $html .= FormFacade::hidden('slide', $value);
        $html .= FormFacade::submit($action, array('class' => 'uk-button uk-button-small uk-border-rounded ' . $button));
        $html .= FormFacade::close();

        return $html;
    }
}
