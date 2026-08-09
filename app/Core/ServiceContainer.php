<?php

require_once '../app/Core/Database.php';

class ServiceContainer
{
    
    /**
     * Shared Database connection
     */
    private Database $db;

    /**
     * Service instances (Singleton per request)
     */
    private array $instances = [];

    /**
     * Service definitions
     */
    private array $definitions = [

        'InventoryTransfer' => [
            'class' => InventoryTransferService::class,
            'dependencies' => [
                InventoryLocationStockModel::class,
                InventoryMovementModel::class,
                InventoryTransferModel::class
            ]
        ],

        'ProjectCost' => [
            'class' => ProjectCostService::class,
            'dependencies' => [
                ProjectCostModel::class,
                InventoryLocationStockModel::class,
                InventoryMovementModel::class,
                ProjectLedgerModel::class,
                InventoryModel::class
            ]
        ],

        'GoodsReceipt' => [
            'class' => GoodsReceiptService::class,
            'dependencies' => [
                PurchaseOrderModel::class,
                GoodsReceiptModel::class,
                GoodsReceiptItemModel::class,
                InventoryMovementModel::class,
                SupplierLedgerModel::class
            ]
        ],

        'SupplierPayment' => [
            'class' => SupplierPaymentService::class,
            'dependencies' => [
                SupplierPaymentModel::class,
                SupplierLedgerModel::class,
                SupplierPaymentAllocationModel::class
            ]
        ],

        'AccountsPayable' => [
            'class' => AccountsPayableService::class,
            'dependencies' => [
                SupplierModel::class,
                SupplierLedgerModel::class,
                SupplierPaymentModel::class
            ]
        ]

    ];

  public function __construct()
{
    /*
    |---------------------------------------------
    | ONE Database connection for the entire request
    |---------------------------------------------
    */

    $this->db = new Database();
}

    /**
     * Resolve Service
     */
    public function make(string $service)
    {
        /*
        |--------------------------------------------------------------------------
        | Return existing instance
        |--------------------------------------------------------------------------
        */

        if (isset($this->instances[$service])) {
            return $this->instances[$service];
        }

        /*
        |--------------------------------------------------------------------------
        | Service exists?
        |--------------------------------------------------------------------------
        */

        if (!isset($this->definitions[$service])) {

            throw new Exception("Unknown service '{$service}'.");

        }

        $definition = $this->definitions[$service];

        $dependencies = [];

        /*
        |--------------------------------------------------------------------------
        | Build all dependencies using SAME Database connection
        |--------------------------------------------------------------------------
        */

        foreach ($definition['dependencies'] as $class) {

            // Load model if needed

            if (!class_exists($class)) {

                require_once '../app/Models/' . $class . '.php';

            }

            $dependencies[] = new $class($this->db);
        }

        /*
        |--------------------------------------------------------------------------
        | Load service if needed
        |--------------------------------------------------------------------------
        */

        $serviceClass = $definition['class'];

        if (!class_exists($serviceClass)) {

            require_once '../app/Services/' . $serviceClass . '.php';

        }

        $this->instances[$service] =
            new $serviceClass(...$dependencies);

        return $this->instances[$service];
    }
}