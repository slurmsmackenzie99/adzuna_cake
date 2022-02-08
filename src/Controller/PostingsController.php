<?php

namespace App\Controller;

use Cake\Http\Client;
use function Composer\Autoload\includeFile;

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
        $this->Authorization->skipAuthorization();

        $this->loadComponent('Paginator');
        $postings = $this->Paginator->paginate($this->Postings->find());
        $this->set(compact('postings'));

        if ($this->request->is('post')) {

        }
    }

    public function view($slug = null)
    {
        $this->Authorization->skipAuthorization();

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
        $this->Authorization->authorize($posting);

        if ($this->request->is('post')) {
            $posting = $this->Postings->patchEntity($posting, $this->request->getData());

            $posting->user_id = $this->request->getAttribute('identity')->getIdentifier();

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
        $this->Authorization->authorize($posting);

        if ($this->request->is(['post', 'put'])) {
            $this->Postings->patchEntity($posting, $this->request->getData(), [
                'accessibleFields' => ['user_id' => false]
            ]);
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
        $this->Authorization->authorize($posting);

        if ($this->Postings->delete($posting)) {
            $this->Flash->success(__('Oferta pracy {0} została usunięta', $posting->title));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function tags()
    {
        $this->Authorization->skipAuthorization();
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

    public function search()
    {
        $this->Authorization->skipAuthorization();
        $appId = "31746dcd";
        $appKey = "d3589b477595d896b7627c76dfd0b8ef";
//        $stanowisko = "javascript developer";
//        $stanowisko = urlencode($stanowisko);

        if ($this->request->is('post')) {
            $lokalizacja = $this->request->getData('lokalizacja');
            $lokalizacja = urlencode($lokalizacja);

            $stanowisko = $this->request->getData('stanowisko');
            $stanowisko = urlencode($stanowisko);

            $http = new Client();
            $response = $http->get(
                "https://api.adzuna.com/v1/api/jobs/pl/search/1?app_id=". $appId . "&app_key=" . $appKey . "&what=" . $stanowisko . "&location0=Polska&location1=" . $lokalizacja
            );
            $jsonData = json_decode($response->getStringBody());
            $results = $jsonData->results;

            $this->set('results', $results);
        };
//        $http = new Client();
//        $response = $http->get(
//            "https://api.adzuna.com/v1/api/jobs/pl/search/1?app_id=". $appId . "&app_key=" . $appKey . "&what=" . $stanowisko
//        );

//        $jsonData = json_decode($response->getStringBody());
//        $results = $jsonData->results;
//
//
//        $this->set('results', $results);
    }
}
