(function(request, requestClass) {"use strict";
    
    window.bitflan = {
        components: {
            generator_component: function() {
                return {
                    domain: '',
                    errors: {},
                    error: false,
                    error_message: '',
                    sending: false,
                    available: false,
                    data: null,
                    prevDomain: null,
                    selections: [
                        "com", "net", "org", "info", "mobi", "biz", "xyz"
                    ],
            
                    init(errorMessages) {
                        this.errors = errorMessages;

                        this.$watch('domain', () => {
                            this.error = false;
                            this.error_message = '';
                        });
                    },
    
                    submit() {
                        if(!this.sending) {
                            if(this.domain.length) {
                                request.post({
                                    url: window.bitflan_baseUrl + 'domain_generator/query',
                                    data: {
                                        keyword: this.domain,
                                        selections: this.selections
                                    },
    
                                    onSend: () => {
                                        this.sending = true;
                                        this.prevDomain = this.domain;

                                        this.data = null;
                                        this.available = null;
                                    },
    
                                    onResponse: (response) => {
                                        const data = JSON.parse(response.text);
    
                                        this.sending = false;
                                        if(data.type == 'error') {
                                            this.error = true;
                                            this.error_message = data.message;
                                            this.data = null;
                                            this.available = false;
                                        } else {
                                            const columns = [ [], [] ];

                                            data.message.forEach((el, i) => i % 2 == 0 ? columns[0].push(el) : columns[1].push(el));

                                            this.data = columns;
                                        }
                                    },
                                    onError: () => {
                                        this.sending = false;
    
                                        this.error = true;
                                        this.error_message = this.errors.invalid_url_unknown;
                                        this.data = null;
                                        this.available = false;
                                    }
                                })
                            } else {
                                this.error = true;
                                this.error_message = this.errors.invalid_domain;
                                this.data = null;
                                this.available = false;
                            }
                        }
                    }
                }
            }
        }
    };
    
    })(vjax, vjaxClass)