var categories_url = document.currentScript.getAttribute('data-get-categories-url')
var attributes_url = document.currentScript.getAttribute('data-get-attributes-url')

var modal = new Vue({
    el: '#new-document',
    data: {
        processing: false,
        categories: [],
        documents: [],
        attributes: [],
        document: {
            category_id: '',
            file: '',
            branch: '',
            department: '',
        },
        error: []
    },
    created: function()  {
        this.fetch_categories()
    },
    methods: {
        fetch_categories: function() {
            this.processing = true
            var self = this
            axios.get(categories_url)
                .then(function(response) {
                    self.categories = response.data
                    self.processing = false
                })
        },
        on_change: function() {
            this.processing = true
            var self = this
            axios.get(attributes_url + '/' + this.document.category_id)
                .then(function(response) {
                    self.attributes = response.data
                })
        }
    },
    computed: {
        disabled: function() {

        },
        with_attributes: function() {
            if(this.attributes.length == 0) { return false }
            else { return true }
        }
    }
})