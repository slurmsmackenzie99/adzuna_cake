<?php
namespace App\Controller;
/**
 * Postings Controller
 *
 * @property \App\Model\Table\PostingsTable $Postings
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class PostingsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }
    public function index()
    {
        $this->loadComponent('Paginator');
        $postings = $this->Paginator->paginate($this->Postings->find());
        $this->set(compact('postings'));
    }
    public function view($slug = null)
    {
        $posting = $this->Postings
            ->findBySlug($slug)
            ->contain('Tags')
            ->firstOrFail();
        $this->set(compact('posting'));
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $posting = $this->Postings->newEmptyEntity();
        if ($this->request->is('post')) {
            $posting = $this->Postings->patchEntity($posting, $this->request->getData());

            $posting->user_id = 1;

            if ($this->Postings->save($posting)) {
                $this->Flash->success(__('Twoje ogłoszenie zostało zapisane'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Nie udało się dodać Twojego ogłoszenia'));
        }
        $tags = $this->Postings->Tags->find('list')->all();

        // Set tags to the view context
        $this->set('tags', $tags);
        $this->set('posting', $posting);
    }
    public function edit($slug)
    {
        $posting = $this->Postings
            ->findBySlug($slug)
            ->contain('Tags')
            ->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $this->Postings->patchEntity($posting, $this->request->getData());
            if ($this->Postings->save($posting)) {
                $this->Flash->success(__('Oferta pracy została uaktualniona'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Nie udało się zaktualizować oferty pracy'));
        }

        $this->set('posting', $posting);
    }

    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);

        $posting = $this->Postings->findBySlug($slug)->firstOrFail();
        if ($this->Postings->delete($posting)) {
            $this->Flash->success(__('Oferta pracy {0} została usunięta', $posting->title));
            return $this->redirect(['action' => 'index']);
        }
    }
    public function tags()
    {
        // The 'pass' key is provided by CakePHP and contains all
        // the passed URL path segments in the request.
        $tags = $this->request->getParam('pass');

        // Use the ArticlesTable to find tagged articles.
        $postings = $this->Postings->find('tagged', [
            'tags' => $tags
        ])
            ->all();

        // Pass variables into the view template context.
        $this->set([
            'postings' => $postings,
            'tags' => $tags
        ]);
    }
}
