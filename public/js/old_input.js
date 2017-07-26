var departments = document.currentScript.getAttribute('data-departments')
var retention_period = document.currentScript.getAttribute('data-retention-period')
var parent_id = document.currentScript.getAttribute('data-parent-id')
var category = document.currentScript.getAttribute('data-category')

$('#selec_adv_1').val(JSON.parse(departments))
$('select[name="retention_period"]').val(retention_period)
$('select[name="parent_id"]').val(parent_id)
$('input[name="category"]').val(category)

if(category == 'root') {
    $('label[id="label-root"]').click()
} else if(category == 'subcategory') {
    $('label[id="label-subcategory"]').click()
}