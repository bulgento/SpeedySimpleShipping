<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

/**
 * Create table 'speedy_simple_shipping/address_cache'
 *
 * - cache_key
 * - cached_data
 * - created_at
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
$installer->getConnection()->createTable($table);

$installer->endSetup();
