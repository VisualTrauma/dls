var retention_period = document.currentScript.getAttribute('data-retention-period')
var parent_id = document.currentScript.getAttribute('data-parent-id')
var departments = document.currentScript.getAttribute('data-departments')

new Vue({
    el: '#category-form',
    data: {
        categories: [],
        category: {
            retention_period: retention_period,
            departments: [],
            subcategory: parent_id == '' ? false : true,
        }
    },
    created: function() {
        var self = this

        if(this.category.subcategory == true) { $('#is_subCategory').attr('checked', true); }
        else if(this.category.subcategory == false) { $('#is_root').attr('checked', true); }

        this.category.departments = departments.split(', ')

        axios.get('/get-categories-by-column/id, name')
        .then(function(response) {
            self.categories = response.data
        })

        UIkit.modal.alert('Note that if you plan to change this category\'s <em class="uk-text-bold">category type</em>, ' +
            '<strong class="uk-text-danger">all the documents under it will also be affected</strong>, this process is just like moving an existing folder to another one')
    },
    methods: {
        is_subcategory: function(value) {
            if(value == true) { $('#is_subCategory').attr('checked', true); $('#is_root').removeAttr = 'checked'; }
            else if(value == false) { $('#is_root').attr('checked', true); $('#is_subCategory').removeAttr = 'checked'; }
            this.category.subcategory = value
        },
        cancel_editing: function() {
          UIkit.modal.confirm('All changes will not be saved. Continue?', function(){ window.location.replace('/categories') })
        }
    },
    computed: {
        disabled: function() {
            if(this.category.subcategory == true) { return false }
            else if(this.category.subcategory == false) { return true }
        }
    }
});