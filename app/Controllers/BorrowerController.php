<?php

namespace App\Controllers;

use App\Models\BorrowerModel;
use App\Models\BorrowHistoryModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Exception;

class BorrowerController extends BaseController
{
    use ResponseTrait;

    public function createBorrower()
    {
        try {
            // Instansiasi BorrowerModel
            $borrowerModel = new BorrowerModel();

            // Ambil data dari request POST
            $data = [
                'name'         => $this->request->getPost('name'),
                'email'        => $this->request->getPost('email'),
                'phone_number' => $this->request->getPost('phone_number'),
                'book_title'   => $this->request->getPost('book_title'),
                'borrow_date'  => $this->request->getPost('borrow_date'),
                'return_date'  => $this->request->getPost('return_date'),
            ];

            // Validasi sederhana
            if (empty($data['name']) || empty($data['phone_number']) || empty($data['book_title']) ||
                empty($data['borrow_date']) || empty($data['return_date'])) {
                return $this->fail('All fields are required.', 400);
            }

            // Masukkan data ke database menggunakan BorrowerModel
            $borrowerModel->insert($data);

            // Redirect ke halaman borrower list dengan pesan sukses
            return redirect()->to('/borrowers')->with('message', 'Borrower added successfully!');
        } catch (Exception $e) {
            // Tangani error
            return $this->failServerError($e->getMessage());
        }
    }



    public function getAllBorrowers()
    {
        try {
            $borrowerModel = new BorrowerModel();
            $borrowers = $borrowerModel->findAll();

            return $this->respond([
                'status'     => 200,
                'borrowers'  => $borrowers
            ]);
        } catch (Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }

    public function listBorrowers()
    {
        $borrowerModel = new BorrowerModel();
        $data['borrowers'] = $borrowerModel->findAll();

        // Load view dengan data borrowers
        return view('borrower/list', $data);
    }
    public function createView()
    {
        return view('borrower/create');
    }
}
