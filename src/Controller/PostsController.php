<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
   public function index()
   {
       $search = $this->request->getQuery('search');
       $town = $this->request->getQuery('town');
       $bedrooms = $this->request->getQuery('bedrooms');
       $bathrooms = $this->request->getQuery('bathrooms');
       $zip = $this->request->getQuery('zip');
       $maxPrice = $this->request->getQuery('max_price');

       $query = $this->Posts->find();

       // Apply search filter if provided
       if ($search) {
           $query->where(['OR' => [
               'address LIKE' => "%$search%",
               'city LIKE' => "%$search%",
               'state LIKE' => "%$search%",
               'zipCode LIKE' => "%$search%",
           ]]);
       }

       // Apply town filter if provided
       if ($town) {
           $query->where(['city' => $town]);
       }

       // Apply bedrooms filter if provided
       if ($bedrooms !== '') {
           $query->where(['bedrooms' => $bedrooms]);
       }

       // Apply bathrooms filter if provided
       if ($bathrooms !== '') {
           $query->where(['bathrooms' => $bathrooms]);
       }

       // Apply zip code filter if provided
       if (!empty($zip)) {
           $query->where(['zipCode' => $zip]);
       }

       // Apply max price filter if provided
       if (!empty($maxPrice)) {
           $query->where(['price <=' => $maxPrice]);
       }

       // Execute the query and get results
       $posts = $query->all();

       // Get distinct towns for the dropdown
       $towns = $this->Posts->find()
           ->select(['city'])
           ->distinct()
           ->extract('city')
           ->toList();

       // Get distinct zip codes for the dropdown
       $zipCodes = $this->Posts->find()
           ->select(['zipCode'])
           ->distinct()
           ->extract('zipCode')
           ->toList();

       // Set variables for the view
       $this->set(compact('posts', 'towns', 'zipCodes', 'search', 'town', 'bedrooms', 'bathrooms', 'zip', 'maxPrice'));
   }



    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $posts = $this->Posts->get($id);
        $this->set('post', $posts);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEmptyEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set('post', $post);
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set(compact('post'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
