var paginate_documents_url = document.currentScript.getAttribute('data-paginate-documents-url')
var documents_url = document.currentScript.getAttribute('data-documents-url')

var table = new Vue({
    el: '#table',
    data: {
        processing: false,
        current_document_retention_date: '',
        elements: [],
        link: '',
        pagination: {
            categories: [],
            documents: [],
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
            axios.get(paginate_documents_url)
                .then(function(response) {
                    console.log(response.data)
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
        populateData: function(response, self) {
            self.processing = false
            self.pagination.documents = response.data.data
            self.pagination.categories = response.data.category
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
            return documents_url + '/' + id
        },
        set_edit_url: function(id) {
            return documents_url + '/' + id + '/edit'
        },
        copied: function() {
            UIkit.notify('DOCUMENT LINK SUCCESSFULLY COPIED!', { status: 'success', pos: 'top-center', timeout: '1500' })
        }
    },
    filters: {
        moment: function (date) {
            if(! date) { return 'INDEFINITE' }
            else { return moment(date).format('MMMM DD, YYYY') }
        }
    }
})