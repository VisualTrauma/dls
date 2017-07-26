var paginate_categories_url = document.currentScript.getAttribute('data-paginate-categories-url')
var categories_url = document.currentScript.getAttribute('data-categories-url')

var table = new Vue({
    el: '#table',
    data: {
        processing: false,
        elements: [],
        pagination: {
            categories: [],
            current_page: '',
            last_page: '',
            next_page_url: '',
            prev_page_url: '',
        }
    },
    created: function() {
        this.refresh_table()
    },
    methods: {
        refresh_table: function() {
            this.processing = true
            var self = this
            axios.get(paginate_categories_url)
            .then(function(response) {
                self.populateData(response, self)
            })
        },
        get_categories: function(url) {
            this.processing = true;
            var self = this;
            axios.get(url)
                .then(function(response) {
                    self.populateData(response, self)
                })
        },
        delete_category: function(id) {
            axios({
                method: 'delete',
                url: categories_url + '/' + id,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            }).then(function (response) {
                UIkit.notify(response.data, { status: 'success', pos: 'bottom-center', timeout: '2000' })
            })
        },
        populateData: function(response, self) {
            self.processing = false
            self.pagination.categories = response.data.data
            self.elements = response.data.elements
            self.pagination.current_page = response.data.current_page
            self.pagination.last_page = response.data.last_page
            self.pagination.next_page_url = response.data.next_page_url
            self.pagination.prev_page_url = response.data.prev_page_url
        },
        is_active: function(url) {
            if(url == this.pagination.current_page) {
                return 'uk-active'
            } else {
                return ''
            }
        },
        set_badge_color: function(value) {
            if(value == 0){
                return 'uk-badge uk-badge-success'
            } else if(value == 3) {
                return 'uk-badge uk-badge-danger'
            } else {
                return 'uk-badge uk-badge-warning'
            }
        },
        set_retention_period: function(value) {
            if(value == 0) {
                return 'INDEFINITE'
            } else {
                return value + ' years'
            }
        },
        confirm_deletion: function(id) {
            var self = this
            UIkit.modal.confirm('You are about to delete this category, ' +
                '<strong class="uk-text-danger">all documents saved under this category will also be deleted</strong>, ' +
                'proceed with caution!', function(){ self.delete_category(id) })
        },
        set_show_url: function(id) {
            return categories_url + '/' + id
        },
        set_edit_url: function(id) {
            return categories_url + '/' + id + '/edit'
        }
    }
})