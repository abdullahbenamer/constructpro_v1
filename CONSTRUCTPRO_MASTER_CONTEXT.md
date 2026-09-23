# CONSTRUCTPRO MASTER CONTEXT

## PROJECT

**Project:** ConstructPro V1  
**Type:** Construction / ERP / Project Management System  
**Stack:** PHP, MySQL, MVC, Bootstrap 5, JavaScript, jQuery, Select2, PHP sessions  
**Repository:** https://github.com/abdullahbenamer/constructpro_v1

This file is the working project context and development rules. It should be kept in the repository and updated when major architecture or workflow decisions change.

---

# 1. CORE DEVELOPMENT RULES

1. GitHub is the source of truth for current code. Inspect the current GitHub version before correcting an existing file.
2. Do not modify GitHub files unless explicitly requested.
3. Normally provide exact paste-ready code/scripts only.
4. During translation work, do not change business logic, database structure, routes, variable names, classes, functions, enum/status values, or stored/user-entered data.
5. Translate UI labels, headings, buttons, errors, notifications, confirmations, alerts, and validation messages.
6. Use the existing translation helper:
   ```php
   __('translation_key')
   ```
7. Avoid duplicate translation keys.
8. Dynamic translated messages must use `sprintf()`:
   ```php
   sprintf(__('message_key'), $value)
   ```
9. Models/services should throw translated Exceptions; controllers handle FlashHelper and redirects.
10. Do not use `die('message')` for normal user-facing errors.
11. Views must NOT include `header.php` or `footer.php`; they are already included by the layout.
12. Keep answers concise and code-first.
13. Headings/titles should be CAPS.

---

# 2. LANGUAGE / TRANSLATION

Translation files:

```text
app/Language/en.php
app/Language/ar.php
```

Supported languages:

```text
en
ar
```

Arabic uses RTL.

Translation helper:

```php
function __($key)
{
    return Language::translate($key);
}
```

The header dynamically sets HTML language and direction.

---

# 3. FLASH MESSAGES

`app/Core/FlashHelper.php` provides:

```php
FlashHelper::error($msg);
FlashHelper::success($msg);
FlashHelper::warning($msg);
```

The header displays:

```text
$_SESSION['error']
$_SESSION['success']
$_SESSION['warning']
```

Preferred usage:

```php
FlashHelper::error(__('error_key'));
FlashHelper::success(__('success_key'));
```

---

# 4. USERS

Current users structure:

```text
id
full_name
user_name
email
mobile
photo
password
created_at
role_id
```

`user_name` is the username field.

Login session includes:

```php
$_SESSION['user_id'];
$_SESSION['user_name'];
$_SESSION['full_name'];
$_SESSION['role_id'];
$_SESSION['role_name'];
$_SESSION['user_photo'];
```

All authenticated users may edit their own profile.

Profile route:

```text
/users/profile
```

Profile editing is separate from:

```text
users.edit
```

---

# 5. ROLES

Current role IDs:

```text
1  ADMIN
2  MANAGER
3  ENGINEER
4  TECHNICIAN
5  ACCOUNTANT
8  STOREKEEPER
9  USER
10 FORMAN
```

CASHIER was removed.

ADMIN has all permissions.

---

# 6. PERMISSIONS

Current permission vocabulary:

```text
users.view
users.create
users.edit
users.delete
projects.view
projects.create
projects.edit
projects.delete
projects.archive
projects.restore
projects.documents.create
projects.documents.delete
project_advances.view
project_advances.create
project_advances.settle
project_costs.view
project_costs.create
project_costs.edit
project_costs.delete
project_finance.view
inventory.view
inventory.create
inventory.edit
inventory.delete
inventory_locations.view
inventory_locations.create
inventory_locations.edit
inventory_locations.delete
inventory_movements.view
inventory_movements.create
inventory_reservations.view
inventory_reservations.create
inventory_reservations.edit
inventory_reservations.delete
inventory_reservations.fulfill
inventory_reservations.cancel
stock_transfers.view
stock_transfers.create
stock_transfers.reverse
inventory_adjustments.view
inventory_adjustments.create
goods_receipts.create
goods_returns.view
goods_returns.create
purchase_orders.view
purchase_orders.create
purchase_orders.edit
purchase_orders.approve
purchase_orders.cancel
supplier_quotations.view
supplier_quotations.create
supplier_quotations.edit
supplier_quotations.accept
supplier_quotations.cancel
supplier_quotations.create_po
supplier_payments.view
supplier_payments.create
suppliers.view
suppliers.create
suppliers.edit
suppliers.delete
suppliers.ledger
customers.view
customers.create
customers.edit
customers.delete
resource_requisitions.view
resource_requisitions.create
resource_requisitions.edit
resource_requisitions.delete
resource_requisitions.submit
resource_requisitions.approve
resource_requisitions.reject
resource_requisitions.fulfill
resources.view
resources.create
resources.edit
resources.delete
resource_categories.view
resource_categories.create
resource_categories.edit
resource_categories.delete
units.view
units.create
units.edit
units.delete
reports.view
technicians.view
purchases.view
admin.access
```

There is no `dashboard.view`.

Known separate issue: some Purchase Order code has both `purchase-orders.*` and `purchase_orders.*` permission names. Do not silently change this during translation work.

---

# 7. AUTHHELPER

`app/Core/AuthHelper.php` provides:

```php
AuthHelper::check()
AuthHelper::role()
AuthHelper::can()
AuthHelper::canView()
```

Known issue to review separately:

`role()` historically used `$_SESSION['role']`, while current login uses:

```php
$_SESSION['role_id']
$_SESSION['role_name']
```

Do not mix this into translation-only work unless explicitly requested.

---

# 8. INVENTORY ARCHITECTURE

IMPORTANT DESIGN DECISION:

`inventory` is the item master, NOT the physical stock location.

Actual physical stock is stored in:

```text
inventory_location_stock
```

Flow:

```text
ITEM MASTER
    ↓
PURCHASE ORDER / RESOURCE REQUISITION
    ↓
GOODS RECEIPT
    ↓
INVENTORY_LOCATION_STOCK
```

An inventory item may exist with zero stock.

Do not restore the old concept where `inventory.location_id` represents current physical stock.

Legacy columns remain temporarily because of dependencies.

---

# 9. INVENTORY MASTER

Intended master fields include:

```text
name
sku
category
brand_id
country_id
min_stock
unit_id
allow_fraction
```

Do not add/edit physical stock, cost, or warehouse fields to the item-master form.

Legacy `base_unit` is not yet dropped.

Unit migration:

```sql
UPDATE inventory i
INNER JOIN units u ON u.unit_code = i.base_unit
SET i.unit_id = u.id;
```

Verify unmatched records before adding the FK.

---

# 10. INVENTORY LOCATIONS

`user_locations`:

```text
user_id
location_id
PRIMARY KEY(user_id, location_id)
```

Meaning:

- A location can have multiple authorized users.
- Storekeeper is a responsible person.
- Authorized users are separate from the storekeeper relationship.

ADMIN can see all locations.

Non-admin users see assigned locations.

Project locations use codes such as:

```text
PRJ-YY-0000
```

Warehouse dropdowns can exclude project locations:

```sql
WHERE l.code NOT LIKE 'PRJ-%'
```

---

# 11. INVENTORY RESERVATIONS

Reservation fields include:

```text
inventory_id
location_id
project_id
quantity
status
created_by
created_at
source_type
source_id
```

Statuses:

```text
ACTIVE
FULFILLED
CANCELLED
```

Available stock is calculated from location stock minus active reservations.

`project_id` remains for backward compatibility. Newer source identification uses:

```text
source_type
source_id
```

---

# 12. UNITS

Active units are retrieved with:

```php
public function getActive()
{
    return $this->db->query(
        "SELECT * FROM units WHERE status = 'ACTIVE' ORDER BY unit_name"
    )->fetchAll();
}
```

Display unit names, not unit codes, where user-facing unit names are required.

---

# 13. STOCK ADJUSTMENTS

Adjustment reasons:

```text
DAMAGED
BROKEN
LOST
FOUND
PHYSICAL_COUNT_CORRECTION
EXPIRED
OTHER
```

Database values must remain unchanged.

Reason options are filtered according to adjustment type.

---

# 14. INVENTORY TRANSFERS

Transfer logic distinguishes:

```text
source warehouse
destination warehouse
```

Source and destination cannot be identical.

Only completed transfers can be reversed.

Service errors should use translated Exceptions.

---

# 15. PROJECT COST TYPES

Current database values:

```text
MATERIALS
HUMAN_RESOURCES
TRANSPORT
EQUIPMENT
SUBCONTRACT
SITE_EXPENSES
PROFESSIONAL_SERVICES
PERMITS_FEES
INSURANCE
BANK_CHARGES
TAXES
MISCELLANEOUS
```

Do not change these values. Only display labels are translated.

---

# 16. PURCHASE ORDERS

Purchase Orders support:

- supplier
- project
- delivery warehouse
- delivery method
- items
- approval
- cancellation
- receiving
- printing

Important translation keys:

```text
delivery_warehouse_required
project_required
purchase_order_created_successfully
purchase_order_locked
purchase_order_not_found
draft_purchase_orders_only_approve
add_item_before_approving_po
purchase_order_approved_successfully
purchase_order_cancelled_successfully
approved_purchase_orders_only_print
purchase_order_already_cancelled
fully_received_po_cannot_be_cancelled
purchase_order_cannot_be_cancelled
```

---

# 17. GOODS RECEIPTS

Goods receipt validations include:

- valid purchase order
- valid supplier
- valid inventory item
- valid warehouse
- received quantity greater than zero
- unit cost not negative
- PO available for receiving
- supplier matches PO
- inventory item belongs to PO
- PO item not already fully received
- received quantity does not exceed remaining PO quantity

Dynamic messages use:

```php
sprintf(__('message_key'), $value1, $value2)
```

---

# 18. GOODS RETURNS

Goods return validations include:

- valid goods receipt item
- valid warehouse
- return quantity greater than zero
- receiving location exists
- selected warehouse matches receiving warehouse
- return quantity does not exceed returnable quantity
- sufficient stock exists

---

# 19. RESOURCE REQUISITIONS

Resource requisitions support:

```text
creation
submission
approval
rejection
fulfillment
inventory material fulfillment
resource fulfillment
```

Important model method:

```php
getFulfillments($requisition_id)
```

Do not replace it with the nonexistent:

```php
getByRequisition()
```

---

# 20. RESOURCE REQUISITION FULFILLMENTS

Validations include:

- requisition exists
- requisition item valid
- fulfillment quantity does not exceed remaining quantity
- inventory item exists
- inventory location selected
- inventory item exists at selected location
- sufficient stock
- sufficient global stock
- valid resource source

Models/services throw translated Exceptions.

---

# 21. REQUISITION PURCHASE ORDERS

PO creation from a Resource Requisition requires:

- approved or partially fulfilled requisition
- remaining inventory materials
- supplier
- valid quantities
- quantity within RR remaining quantity
- actual supplier unit cost
- non-negative unit cost
- at least one material quantity

---

# 22. SUPPLIER QUOTATIONS

Workflow:

```text
Draft
→ Accepted
→ Purchase Order
```

Validations include:

- supplier selected
- quotation date
- quotation lock
- item description
- quantity > 0
- unit price >= 0
- valid quality status
- quotation exists
- only draft quotations can be accepted
- at least one item before acceptance
- accepted quotation required for PO
- PO not already created
- quotation contains items
- inventory-linked items required

---

# 23. RESOURCES / RESOURCE CATEGORIES / UNITS

Models should not return hardcoded English user messages.

Important keys:

```text
resource_not_found
resource_cannot_be_deleted_in_use
resource_deleted_successfully

resource_category_not_found
resource_category_cannot_be_deleted_in_use
resource_category_deleted_successfully

unit_not_found
unit_cannot_be_deleted_in_use
unit_deleted_successfully
```

Controllers use:

```php
FlashHelper::error($result['message']);
FlashHelper::success($result['message']);
```

---

# 24. ROLE DELETION

A role cannot be deleted while assigned to users.

Keys:

```text
role_cannot_be_deleted_in_use
role_deleted_successfully
```

Controller pattern:

```php
if (!$result['success']) {
    FlashHelper::error($result['message']);
} else {
    FlashHelper::success(__('role_deleted_successfully'));
}
```

---

# 25. TRANSLATION SWEEP

The system is being audited for all user-facing:

- errors
- notifications
- confirmations
- alerts
- browser `alert()`
- `die('...')`
- raw `$_SESSION['error']`
- raw `$_SESSION['success']`
- raw `$_SESSION['warning']`
- hardcoded Exception messages
- English validation messages

Goal:

```text
NO USER-FACING ENGLISH MESSAGE SHOULD BYPASS THE TRANSLATION SYSTEM.
```

Exceptions for now:

- system-level/database fatal handling
- developer/debug messages that are never user-facing
- database enum/status values
- user-entered data

---

# 26. IMPORTANT EXISTING TRANSLATION KEYS

```text
please_select_inventory_item
please_select_location
please_select_project
please_select_required_by_date
reservation_created_successfully
reservation_fulfilled_successfully
active_reservations_only_editable
active_reservations_only_deletable
reservation_quantity_must_be_greater_than_zero
insufficient_available_stock

transfer_completed_successfully

invalid_inventory_item
invalid_warehouse_location
invalid_quantity
unit_cost_cannot_be_negative
unable_to_add_stock
not_enough_stock_selected_warehouse
source_destination_warehouses_same
not_enough_stock_source_warehouse
adjustment_quantity_cannot_be_zero
adjustment_exceeds_available_stock
adjustment_insufficient_stock
unable_to_adjust_inventory_stock
transfer_not_found
completed_transfers_only_reverse
unable_to_reverse_transfer
transfer_reversed_successfully

invalid_adjustment_type
adjustment_quantity_must_be_greater_than_zero
valid_adjustment_reason_required
notes_required_for_other_reason
stock_adjustment_posted_successfully
adjustment_quantity_exceeds_available

goods_receipt_created_successfully
invalid_purchase_order
invalid_supplier
received_quantity_must_be_greater_than_zero
purchase_order_not_found
purchase_order_not_available_for_receiving
supplier_does_not_match_purchase_order
inventory_item_not_in_purchase_order
po_item_already_fully_received
cannot_receive_remaining_quantity

goods_returned_successfully
invalid_goods_receipt_item
return_quantity_must_be_greater_than_zero
goods_receipt_item_not_found
goods_receipt_no_receiving_location
return_location_does_not_match_receiving_location
goods_receipt_item_already_fully_returned
cannot_return_remaining_quantity
not_enough_stock_selected_warehouse_available

quotation_date_required
quotation_locked
item_description_required
quantity_must_be_greater_than_zero
unit_price_cannot_be_negative
invalid_quality_status
quotation_item_added_successfully
quotation_not_found
only_draft_quotations_can_be_accepted
add_item_before_accepting_quotation
supplier_quotation_accepted_successfully
quotation_cancelled_successfully
no_quotations_found_for_procurement_reference
only_accepted_quotations_can_create_po
po_already_created_from_quotation
quotation_contains_no_items
quotation_item_not_linked_to_inventory
purchase_order_created_from_quotation_successfully

approved_or_partial_requisitions_only_create_po
no_remaining_inventory_materials_to_purchase
please_select_supplier
rr_quantity_exceeds_remaining
actual_supplier_unit_cost_required
quantity_required_for_material
purchase_order_created_from_requisition_successfully

resource_not_found
resource_cannot_be_deleted_in_use
resource_deleted_successfully
resource_category_not_found
resource_category_cannot_be_deleted_in_use
resource_category_deleted_successfully
unit_not_found
unit_cannot_be_deleted_in_use
unit_deleted_successfully
role_cannot_be_deleted_in_use
role_deleted_successfully
```

---

# 27. USER PROFILE TRANSLATION KEYS

```text
my_profile
edit_profile
update_profile
change_password
current_password
new_password
confirm_password
profile_updated_successfully
password_changed_successfully
current_password_incorrect
passwords_do_not_match
new_password_required
```

Arabic values:

```text
my_profile = ملفي الشخصي
edit_profile = تعديل الملف الشخصي
update_profile = تحديث الملف الشخصي
change_password = تغيير كلمة المرور
current_password = كلمة المرور الحالية
new_password = كلمة المرور الجديدة
confirm_password = تأكيد كلمة المرور
profile_updated_successfully = تم تحديث الملف الشخصي بنجاح.
password_changed_successfully = تم تغيير كلمة المرور بنجاح.
current_password_incorrect = كلمة المرور الحالية غير صحيحة.
passwords_do_not_match = كلمتا المرور غير متطابقتين.
new_password_required = كلمة المرور الجديدة مطلوبة.
```

---

# 28. INVENTORY CATEGORY TRANSLATIONS

Database category values remain unchanged.

```text
CIVIL & STRUCTURAL       → civil_structural
BUILDING & FINISHING     → building_finishing
PLUMBING & DRAINAGE      → plumbing_drainage
HVAC                     → hvac
ELECTRICAL               → electrical
FIRE FIGHTING & ALARM    → fire_fighting_alarm
LOW CURRENT              → low_current
HAND TOOLS               → hand_tools
EQUIPMENT                → equipment
SAFETY & PPE             → safety_ppe
CONSUMABLES              → consumables
OTHER                    → other
```

Arabic:

```text
civil_structural        = مدني وإنشائي
building_finishing      = مبانٍ وتشطيبات
plumbing_drainage       = السباكة والصرف الصحي
hvac                    = التكييف والتهوية
electrical              = كهرباء
fire_fighting_alarm     = مكافحة الحريق والإنذار
low_current             = التيار الخفيف
hand_tools              = الأدوات اليدوية
equipment               = المعدات
safety_ppe              = السلامة ومعدات الوقاية الشخصية
consumables             = المستهلكات
other                   = أخرى
```

---

# 29. PROJECT LOCATIONS

`projects.location_id` is intended to reference:

```text
inventory_locations.id
```

Project creation generates a location code similar to:

```text
PRJ-YY-0000
```

Preserve this relationship.

---

# 30. PROJECT MANAGERS

Project Manager selection uses users with roles:

```text
ADMIN
MANAGER
```

Do not change this without explicit instruction.

---

# 31. DATABASE / FOREIGN KEY NOTES

Application references users through fields including:

```text
customers.account_manager_id
employees.manager_id
employees.user_id
goods_receipts.created_by
goods_returns.created_by
inventory_locations.storekeeper_id
inventory_movements.created_by
inventory_reservations.created_by
inventory_transfers.created_by
projects.project_manager_id
purchase_orders.approved_by
purchase_orders.created_by
resource_requisitions.approved_by
resource_requisition_comments.user_id
supplier_payments.created_by
```

Do not assume `employees.manager_id` is a user ID without checking the employee schema.

---

# 32. KNOWN SEPARATE ISSUES

Do not silently change these during translation work:

1. `Auth.php` has a stale role switch using `$_SESSION['role']`.
2. Current login uses `role_id` and `role_name`.
3. Purchase Order permission names have hyphen/underscore inconsistencies.
4. Legacy inventory columns remain intentionally.
5. Database-level `die()` handling is separate from ordinary UI translation.
6. Native HTML5 validation can display browser-language messages such as:
   `Value must be less than or equal to 150.`
   Arabic localization requires client-side `setCustomValidity()` if desired.
7. These issues should be handled separately unless explicitly requested.

---

# 33. STANDARD WORKFLOW FOR A FULL SWEEP

When asked to sweep the system:

```text
1. Inspect the current GitHub repository.
2. Inspect the actual current PHP/JS files.
3. Identify user-facing hardcoded messages.
4. Compare against existing en.php/ar.php.
5. Avoid duplicate translation keys.
6. Identify exact file and code location.
7. Provide exact paste-ready replacement.
8. Preserve unrelated business logic.
9. Do not commit unless explicitly requested.
```

For a specific controller:

```text
1. Fetch the current GitHub file.
2. Read the complete current source.
3. Identify all translation/error/notification issues.
4. Provide corrected code or exact replacement blocks.
5. Preserve everything else.
```

---

# 34. USER PREFERENCE

The user explicitly prefers:

> Don't do or change anything yourself. Just provide the script.

Therefore, unless explicitly asked to modify GitHub:

- inspect
- analyze
- provide code
- do not commit
- do not update GitHub
- do not delete anything

---

# 35. NEW CONVERSATION START

Recommended instruction:

```text
This is ConstructPro V1.
Read CONSTRUCTPRO_MASTER_CONTEXT.md from the GitHub repository first.
Then inspect the CURRENT GitHub source before making any recommendation.
Do not modify GitHub.
Provide paste-ready code only.
```

---

# 36. SOURCE-OF-TRUTH PRIORITY

When information conflicts:

```text
1. CURRENT GITHUB SOURCE CODE
2. CURRENT DATABASE SCHEMA
3. CONSTRUCTPRO_MASTER_CONTEXT.md
4. Recent confirmed conversation decisions
5. Older conversation history
6. General assumptions
```

Never replace current source code with an old remembered snippet without checking the current repository.

---

# END OF CONSTRUCTPRO MASTER CONTEXT
