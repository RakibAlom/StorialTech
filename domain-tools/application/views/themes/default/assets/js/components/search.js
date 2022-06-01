(function(request, requestClass) {"use strict";
    
    window.bitflan = {
        components: {
            search_component: function() {
                return {
                    domain: '',
                    errors: {},
                    error: false,
                    error_message: '',
                    max_per_page: 100,
                    sending: false,
                    status: 'blank',
                    others: null,
                    others_render: [],
                    suggestions: null,
                    suggestions_render: [],
                    prevDomain: null,
                    price: null,
                    link: null,
            
                    init(errorMessages, maxPerPage) {
                        this.errors = errorMessages;
                        this.max_per_page = maxPerPage;
                        
                        this.$watch('domain', () => {
                            this.error = false;
                            this.error_message = '';
                        });
                    },
    
                    singleQuery(url) {
                        return new Promise((resolve, reject) => {
                            const req = new vjaxClass();
                            
                            req.post({
                                url: window.bitflan_baseUrl + 'search/single_query',
                                data: {
                                    url: url
                                },
    
                                onResponse: (response) => {
                                    resolve(JSON.parse(response.text));
                                },
                                onError: (err) => console.error(err)
                            })
                        });
                    },
                    paginateTlds() {
                        this.others_render = [...this.others_render, ...this.others.splice(0, this.max_per_page)];
                        this.suggestions_render = [...this.suggestions_render, ...this.suggestions.splice(0, this.max_per_page)];
                    },
                    submit() {
                        if(!this.sending) {
                            if(this.domain.length) {
                                request.post({
                                    url: window.bitflan_baseUrl + 'search/query',
                                    data: {
                                        url: this.domain
                                    },
    
                                    onSend: () => {
                                        this.sending = true;
                                        this.prevDomain = this.domain;

                                        this.suggestions = null;
                                        this.others = null;
                                        this.others_render = [];
                                        this.suggestions_render = [];
                                        this.status = 'blank';
                                    },
    
                                    onResponse: (response) => {
                                        console.log(response);

                                        const data = JSON.parse(response.text);
    
                                        this.sending = false;
                                        if(data.type == 'error') {
                                            this.error = true;
                                            this.error_message = data.message;

                                            this.suggestions = null;
                                            this.others = null;
                                            this.others_render = [];
                                            this.suggestions_render = [];
                                            this.status = 'blank';
                                        } else {

                                            if(data.type == 'available') {
                                                this.price  = data.price;
                                                this.status = 'available';
                                            } else
                                                this.status = 'not-available';
                                            
                                            this.link   = data.link;

                                            this.prevDomain  = data.domain;
                                            this.others      = data.other_tlds;
                                            this.suggestions = data.suggestions;

                                            this.paginateTlds()
                                        }
                                    },
                                    onError: () => {
                                        this.sending = false;
    
                                        this.error = true;
                                        this.error_message = this.errors.invalid_url_unknown;

                                        this.suggestions = null;
                                        this.others = null;
                                        this.others_render = [];
                                        this.suggestions_render = [];
                                        this.status = 'blank';
                                    }
                                })
                            } else {
                                this.error = true;
                                this.error_message = this.errors.invalid_domain;
                                
                                this.suggestions = null;
                                this.others = null;
                                this.others_render = [];
                                this.suggestions_render = [];
                                this.available = false;
                            }
                        }
                    }
                }
            }
        }
    };
    
    })(vjax, vjaxClass)