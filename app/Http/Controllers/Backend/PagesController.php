<?php
namespace amity\Http\Controllers\Backend;

use Illuminate\Http\Request;
use amity\Http\Requests\storePageRequest;
use amity\Http\Requests\updatePageRequest;
use amity\Page;
use Baum\MoveNotPossibleException;



class PagesController extends Controller
{

    protected $pages;

    public function __construct(Page $pages) {
        $this->pages = $pages;

        parent::__construct();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Page $pages)
    {
        $pages = $this->pages->all();

        return view('backend.pages.index', compact('pages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Page $page)
    {
        $templates = $this->getPageTemplates();
         $orderPages = $this->pages->where('hidden', false)->orderBy('lft', 'asc')->get();
        return view('backend.pages.form', compact('page', 'templates', 'orderPages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePageRequest $request)
    {
       $page = $this->pages->create($request->only('title', 'name', 'uri', 'content', 'template', 'hidden'));

       $this->updatePageOrder($page, $request); 

        return redirect(route('pages.index'))->with(['status' => 'A new page have been created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = $this->pages->findOrFail($id);
        $templates = $this->getPageTemplates();
        $orderPages = $this->pages->where('hidden', false)->orderBy('lft', 'asc')->get();
        return view('backend.pages.form', compact('page', 'templates', 'orderPages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updatePageRequest $request, $id)
    {
        $page = $this->pages->findOrFail($id);

        if($response = $this->updatePageOrder($page, $request)) {
            return $response;
        }

        $page->fill($request->only('title', 'name', 'uri', 'content', 'template', 'hidden'))->save();

        return redirect(route('pages.edit', $page->id))->with(['status'=> 'Page has been updated']);
    }

    public function confirm($id) {
        $page = $this->pages->findOrFail($id);

        return view('backend.pages.confirm', compact('page'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = $this->pages->findOrFail($id);

        foreach($page->children as $child) {
            $child->makeRoot();
        }

        $page->delete();

        return redirect(route('pages.index'))->with(['status' => ' The Page has been deleted']);
    }

    protected  function getPageTemplates() {
        $templates = config('cms.templates');

        return ['' => ''] + array_combine(array_keys($templates),  array_keys($templates));

    }

    protected function updatePageOrder(page $page, Request $request) {
            if($request->has('order', 'orderPage')) {
                try {
                    $page->updateOrder($request->input('order'), $request->input('orderPage'));
                } catch(MoveNotPossibleException $e) {
                        return redirect(route('pages.edit', $page->id))->withInput()->withErrors(['error' => 'Cannot make a page a child of itself']);
                }
            }
    }

}
