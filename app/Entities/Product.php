<?php namespace App\Entities;

/**
 * @Entity @Table(name="Product")
 **/
class Product
{
    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /** @Column(type="integer", length=11) * */
    protected $storeId;

    /** @Column(type="string") * */
    protected $name;

    /** @Column(type="double") * */
    protected $price;

    /** @Column(type="string", length="256") * */
    protected $shortDescription;

    /** @Column(type="text", length="1000") * */
    protected $longDescription;

    /** @Column(type="text", length="1000") * */
    protected $metaDescription;

    /** @Column(type="text", length="1000") * */
    protected $supplier;

    /** @Column(type="text", length="1000") * */
    protected $brand;

    /** @Column(type="text", length="1000") * */
    protected $model;

    /** @Column(type="integer", length=11) * */
    protected $imageId;

    /** @Column(type="integer", length=11) * */
    protected $thumbnailId;

    /** @Column(type="integer", length=11) * */
    protected $categoryId;

    /** @Column(type="integer", length=11) * */
    protected $VATId;

    /** @Column(type="datetime") * */
    protected $availableSince;

    /** @Column(type="string", length="50") * */
    protected $sku;

    /** @Column(type="integer", length=11) * */
    protected $percentage;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getStoreId(): int
    {
        return $this->storeId;
    }

    public function setStoreId(int $storeId): int
    {
        $this->storeId = $storeId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): void
    {
        $this->shortDescription = $shortDescription;
    }

    public function getLongDescription(): string
    {
        return $this->longDescription;
    }

    public function setLongDescription(string $longDescription): void
    {
        $this->longDescription = $longDescription;
    }

    public function getMetaDescription(): string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(string $metaDescription): void
    {
        $this->metaDescription = $metaDescription;
    }

    public function getSupplier(): string
    {
        return $this->supplier;
    }

    public function setSupplier(string $supplier): void
    {
        $this->supplier = $supplier;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getImageId(): int
    {
        return $this->imageId;
    }

    public function setImageId(int $imageId): void
    {
        $this->imageId = $imageId;
    }

    public function getThumbnailId(): int
    {
        return $this->thumbnailId;
    }

    public function setThumbnailId(int $thumbnailId): void
    {
        $this->thumbnailId = $thumbnailId;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    public function getVATId(): int
    {
        return $this->VATId;
    }

    public function setVATId(int $VATId): void
    {
        $this->VATId = $VATId;
    }

    // TODO: Add type hinting for availableSince.
    public function getAvailableSince()
    {
        return $this->availableSince;
    }

    public function setAvailableSince($availableSince): void
    {
        $this->availableSince = $availableSince;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    public function getPercentage(): int
    {
        return $this->percentage;
    }

    public function setPercentage(int $percentage): void
    {
        $this->percentage = $percentage;
    }
}