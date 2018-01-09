<?php


class ChaptersController extends AppController
{
    public $helpers = array('Html', 'Form');

    public function index()
    {
        $this->set('chapters', $this->Chapter->find('all'));
    }

    public function view($id = null)
    {
        if(!$id) {
            throw new NotFoundException(__('Invalid Chapter'));
        }
        $chapter = $this->Chapter->findById($id);

        if(!$chapter) {
            throw new NotFoundException(__('Invalid Chapter'));
        }

        $this->set('chapter', $chapter);
    }

    public function add()
    {
        if($this->request->is('post')) {
            $this->Chapter->create();
            if($this->Chapter->save($this->request->data)) {
                $this->Flash->success(__('Your post has been saved'));
                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('Unable to add your post.'));
        }
    }

    public function edit($id = null)
    {
        if(!$id)
        {
            throw new NotFoundException(__('Invalid Chapter'));
        }

        $chapter = $this->Chapter->findById($id);
        if(!$chapter) {
            throw new NotFoundException(__('Invalid Chapter'));
        }

        if($this->request->is(['post', 'put'])) {
            $this->Chapter->id = $id;
            if($this->Chapter->save($this->request->data)) {
                $this->Flash->success(__('Your chapter has been updated'));
                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('Unable to update your Chapter'));
        }
        if(!$this->request->data) {
            $this->request->data = $chapter;
        }
    }

    public function delete($id)
    {
        if($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if($this->Chapter->delete($id)) {
            $this->Flash->success(
                __('The post whit id: %s has been deleted.', h($id))
            );
        } else {
            $this->Flash->error(
                __('The post whit id: %s could been deleted.', h($id))
            );
        }
        return $this->redirect(['action' => 'index']);
    }
}