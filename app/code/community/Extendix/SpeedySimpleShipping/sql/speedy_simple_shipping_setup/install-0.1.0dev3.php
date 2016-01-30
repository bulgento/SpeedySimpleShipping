<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

/** Dropping the cache table in order to recreate it again. I made a mistake with versions naming,
 * so I need to start with clear and correct module version in order be able to run upgrades
 *
 * !!! I had manually to delete the module record from core_resource !!!
 */
//$installer->getConnection()->dropTable($installer->getTable('speedy_simple_shipping/address_cache'));

/**
 * Create table 'speedy_simple_shipping/address_cache'
 *
 * -- cache_key
 * -- cached_data
 * -- created_at
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('speedy_simple_shipping/address_cache'))
    ->addColumn(
        'cache_key',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        255,
        array(
            'identity'       => false,
            'auto_increment' => false,
            'unsigned'       => true,
            'nullable'       => false,
            'primary'        => true,
        ),
        'Cache Key'
    )
    ->addColumn('cached_data', Varien_Db_Ddl_Table::TYPE_BLOB, '64K', array(
    ), 'Cached Data')
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
    ), 'Created At')
    ->setComment('Speedy Address Cache');
//$installer->getConnection()->createTable($table);

/**
 * Create table 'speedy_simple_shipping/address_book_entity'
 *
 * -- entity_id
 * -- customer_address_id (PK)
 * -- magento_address_hash
 * -- siteId
 * -- siteName
 * -- quarterId
 * -- quarterName
 * -- streetId
 * -- streetName
 * -- streetNo
 * -- blockNo
 * -- entranceNo
 * -- floorNo
 * -- apartmentNo
 * -- addressNote
 * -- postCode
 * -- region
 * -- created_at
 * -- updated_at
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('speedy_simple_shipping/address_book_entity'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Entity Id')
    ->addColumn('customer_address_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
    ), 'Customer Address Id')
    ->addColumn('magento_address_hash', Varien_Db_Ddl_Table::TYPE_TEXT, 32, array(
    ), 'Magento Address Hash')
    ->addColumn('siteId', Varien_Db_Ddl_Table::TYPE_BIGINT, null, array(
        'unsigned'  => false,
        'nullable'  => false,
    ), 'Site Id')
    ->addColumn('siteName', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => true,
    ), 'Site Name')
    ->addColumn('quarterId', Varien_Db_Ddl_Table::TYPE_BIGINT, null, array(
        'unsigned'  => false,
        'nullable'  => true,
    ), 'Quarter Id')
    ->addColumn('quarterName', Varien_Db_Ddl_Table::TYPE_TEXT, 50, array(
        'nullable'  => true,
    ), 'Quarter Name')
    ->addColumn('streetId', Varien_Db_Ddl_Table::TYPE_BIGINT, null, array(
        'unsigned'  => false,
        'nullable'  => true,
    ), 'Street Id')
    ->addColumn('streetName', Varien_Db_Ddl_Table::TYPE_TEXT, 50, array(
        'nullable'  => true,
    ), 'Street Name')
    ->addColumn('streetNo', Varien_Db_Ddl_Table::TYPE_TEXT, 10, array(
        'nullable'  => true,
    ), 'Street Number')
    ->addColumn('blockNo', Varien_Db_Ddl_Table::TYPE_TEXT, 32, array(
        'nullable'  => true,
    ), 'Block Number')
    ->addColumn('entranceNo', Varien_Db_Ddl_Table::TYPE_TEXT, 10, array(
        'nullable'  => true,
    ), 'Entrance Number')
    ->addColumn('floorNo', Varien_Db_Ddl_Table::TYPE_TEXT, 10, array(
        'nullable'  => true,
    ), 'Floor Number')
    ->addColumn('apartmentNo', Varien_Db_Ddl_Table::TYPE_TEXT, 10, array(
        'nullable'  => true,
    ), 'Apartment Number')
    ->addColumn('addressNote', Varien_Db_Ddl_Table::TYPE_TEXT, 200, array(
        'nullable'  => true,
    ), 'Address Note')
    ->addColumn('postCode', Varien_Db_Ddl_Table::TYPE_TEXT, 10, array(
        'nullable'  => true,
    ), 'Post Code')
    ->addColumn('region', Varien_Db_Ddl_Table::TYPE_TEXT, 50, array(
        'nullable'  => true,
    ), 'Region Name')
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
    ), 'Created At')
    ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
    ), 'Updated At')
    ->setComment('Speedy Address Book');
$installer->getConnection()->createTable($table);

$installer->endSetup();