<?php namespace Importer\Entities;

/**
 * @Entity @Table(name="Product")
 * @HasLifecycleCallbacks
 **/
class Product
{
    /** @Id @Column(name="Id", type="integer") @GeneratedValue * */
    protected $id;

    /** @Column(name="StoreId", type="integer", length=11) * */
    protected $storeId = 1;

    /** @Column(name="Name", type="string") * */
    protected $name;

    /** @Column(name="Price", type="float") * */
    protected $price;

    /** @Column(name="ShortDescription", type="string", length=256) * */
    protected $shortDescription;

    /** @Column(name="FullDescription", type="text") * */
    protected $fullDescription;

    /** @Column(name="MetaDescription", type="text", length=1000) * */
    protected $metaDescription;

    /** @Column(name="Supplier", type="text", length=1000) * */
    protected $supplier = 'Schoeisel BV';

    /** @Column(name="Brand", type="text", length=1000) * */
    protected $brand;

    /** @Column(name="Model", type="text", length=1000) * */
    protected $model;

    /** @Column(name="ImageId", type="integer", length=11) * */
    protected $imageId = 34;

    /** @Column(name="ThumbnailId", type="integer", length=11) * */
    protected $thumbnailId = 87;

    /** @Column(name="CategoryId", type="integer", length=11) * */
    protected $categoryId = 1;

    // TODO: Define VAT relation
    /** @Column(name="VATId", type="integer", length=11) * */
    protected $vatId;

    /** @Column(name="AvailableSince", type="datetime") * */
    protected $availableSince;

    /** @Column(name="Sku", type="string", length=50) * */
    protected $sku;

    /** @Column(name="Percentage", type="integer", length=11) * */
    protected $percentage;

    /**
     * @PrePersist
     */
    public function onPrePersistSetAvailableSince(): void
    {
        $this->availableSince = new \DateTime();
    }

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

    public function getFullDescription(): string
    {
        return $this->fullDescription;
    }

    public function setFullDescription(string $fullDescription): void
    {
        $this->fullDescription = $fullDescription;
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

    public function getVatId(): int
    {
        return $this->vatId;
    }

    public function setVatId(int $VATId): void
    {
        $this->vatId = $VATId;
    }

    public function getAvailableSince(): \DateTime
    {
        return $this->availableSince;
    }

    public function setAvailableSince(\DateTime $availableSince): void
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