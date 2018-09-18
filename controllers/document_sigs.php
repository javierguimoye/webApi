<?php namespace Controllers;

use Inc\Req;
use Models\DocumentSig;

class document_sigs extends _controller
{

    public function index(Req $req)
    {
        $fils = rsp(true)
            ->set('max', $req->num('max', 10))
            ->set('page', $req->num('page', 1))
            ->set('sort', $req->any('sort', 'asc'))
            ->set('sort_by', $req->any('sort_by', 'name'))
            ->set('date_from', $req->date('date_from'))
            ->set('date_to', $req->date('date_to'))
            ->set('word', $req->any('word'));

        $qb = DocumentSig::where('state', '!=', DocumentSig::_STATE_DELETED);

        if (!empty($fils->date_from) && !empty($fils->date_to))
            $qb->whereBetween('DATE(date_created)', $fils->date_from, $fils->date_to);

        if (!empty($fils->word))
            $qb->where('name', 'LIKE', '%' . str_replace(' ', '%', $fils->word) . '%');

        $qb->offset(($fils->page - 1) * $fils->max);
        $qb->limit($fils->max);
        $qb->orderBy($fils->sort_by, $fils->sort);

        $items = [];
        foreach ($qb->get() as $o) {

            $o->file_url = empty($o->file) ? '' : URL_BASE . 'uploads/' . $o->file;

            $items[] = $o;
        }

        $fils->set('total', $qb->count());
        $fils->set('pages', ceil($fils->total / $fils->max));
        $fils->set('items', $items);

        return $fils;
    }

    public function create(Req $req)
    {
        $item = DocumentSig::find($req->num('id'));
        $item->data('name', $req->any('name'));

        if (empty($item->name)) {
            return rsp('Ingresa un nombre');
        } else {
            $r = $item->createOrUpdateRSP();

            if ($r->ok) {
                $file = @$_FILES['file'];
                if (isset($file['tmp_name']) && !empty($file['tmp_name'])) {
                    $pic = 'document_sig_' . $r->id . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
                    if (@move_uploaded_file($file['tmp_name'], _PATH_ . 'uploads/' . $pic)) {
                        if (DocumentSig::find($r->id)->update(['file' => $pic . '?t=' . time()])) {

                        } else {
                            $response['msg'] = 'Error DB :: update_pic';
                        }
                    } else {
                        $response['msg'] = 'error_upload_image';
                    }
                }
            }

            return $r;
        }
    }

    public function item($id)
    {
        $item = DocumentSig::find($id);

        if ($item->exist()) {
            return rsp(true)->merge($item);
        } else {
            return rsp('No se reconoce');
        }
    }

    public function dataForm(Req $req)
    {
        $item = DocumentSig::find($req->num('id'));
        $item->file_url = empty($item->file) ? '' : URL_BASE . 'uploads/' . $item->file;

        return rsp(true)
            ->set('item', $item);
    }

    public function remove(Req $req)
    {
        return DocumentSig::deleteRSP($req->num('id'));
    }

}