var get_categories_url = document.currentScript.getAttribute('data-get-categories-url')

var modal = new Vue({
    el: '#new-category',
    data: {
        processing: false,
        categories: [],
        category: {
            name: '',
            parent_id: '',
            departments: [],
            raw_name: '',
            retention_period: '',
            subcategory: false
        },
        error: []
    },
    computed: {
        is_subcategory: function() {
            if(this.category.subcategory == false) {
                this.error.parent_id = ''
                return false
            }
            else {
                this.fetch_categories()
                return true
            }
        }
    },
    methods: {
        add_category: function() {
            this.processing = true
            var self = this
            axios({
                method: 'post',
                url: '/categories',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: this.category
            }).then(function (response) {
                self.processing = false
                self.category.name = '';
                self.category.department = '';
                self.category.subcategory = false;
                self.category.retention_period = '';
                $('#new-category').removeClass('uk-open');
                table.refresh_table()
                UIkit.notify('CATEGORY SUCCESSFULLY ADDED!', {
                    status: 'success',
                    pos: 'bottom-center',
                    timeout: '2000'
                })
            })
                .catch(function (error) {
                    self.processing = false
                    self.error = error.response.data
                })
        },
        withError: function(value) {
            if(value == '') { return false }
            else { return true }
        },
        fetch_categories: function() {
            this.processing = true
            var self = this
            axios.get(get_categories_url)
            .then(function(response) {
                self.categories = response.data
                self.processing = false
            })
        }
    }
})