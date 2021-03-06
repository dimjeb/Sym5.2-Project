<?php

namespace App\Form\Handler;

use App\Entity\Product;
use App\Utils\File\FileSaver;
use App\Utils\Manager\ProductManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Form;

class ProductFormHandler
{
    /**
     * @var FileSaver
     */
    private $fileSaver;

    /**
     * @var ProductManager
     */
    private $productManager;

    public function __construct(ProductManager $productManager, FileSaver $fileSaver)
    {

        $this->fileSaver = $fileSaver;
        $this->productManager = $productManager;
    }

    public function processEditForm(Product $product, Form $form)
    {
        $this->productManager->save($product);

        $newImageFile = $form->get('newImage')->getData();

        $tempImageFilename = $newImageFile
            ? $this->fileSaver->saveUploadedFileIntoTemp($newImageFile)
            : null;


        $this->productManager->updateProductImages($product, $tempImageFilename);

        //TODO: add a new image with different sizes to the product
        // 1. save product's changes (+)
        // 2. save uploaded file into temp dir (+)
        // 3. Work with product (addProductImage) and ProductImage
        // 3.1 Get path of folder with images of product (+)
        // 3.2 Work with ProductImage
        // 3.2.1 Resize and save image into folder (BIG, MIDDLE, SMALL) (+)
        // 3.2.2 Create ProductImage and return it to Product (+)
        // 3.3 Save Product with new ProductImage (+)

        $this->productManager->save($product);
        return $product;
    }

}