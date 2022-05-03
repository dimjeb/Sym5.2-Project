<?php

namespace App\Form\Handler;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Form;

class ProductFormHandler
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {

        $this->entityManager = $entityManager;
    }

    public function processEditForm(Product $product, Form $form)
    {
        $this->entityManager->persist($product);
        //TODO: add a new image with different sizes to the product
        // 1. save product's changes
        // 2. save uploaded file into temp dir
        // 3. Work with product (addProductImage) and ProductImage
        // 3.1 Get path of folder with images of product
        // 3.2 Work with ProductImage
        // 3.2.1 Resize and save image into folder (BIG, MIDDLE, SMALL)
        // 3.2.2 Create ProductImage and return it to Product
        // 3.3 Save Product with new ProductImage

        dd($product,$form->get('newImage')->getData());

        $this->entityManager->flush();

        return $product;
    }

}