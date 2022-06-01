(function(request, requestClass) {"use strict";
    
    window.bitflan = {
        components: {
            location_component: function() {
                return {
                    domain: '',
                    errors: {},

                    error: false,
                    error_message: '',
                    sending: false,
                    ip: null,
                    data: null,
            
                    init(errorMessages) {
                        this.errors = errorMessages;
                        
                        this.$watch('domain', () => {
                            this.error = false;
                            this.error_message = '';
                        });
                    },
            
                    domain_check() { 
                        return this.domain.includes('.');
                    },
    
                    submit() {
                        if(!this.sending) {
                            if(this.domain.length && this.domain_check()) {
                                request.post({
                                    url: window.bitflan_baseUrl + 'location/query',
                                    data: {
                                        url: this.domain
                                    },
    
                                    onSend: () => this.sending = true,
    
                                    onResponse: (response) => {
                                        const data = JSON.parse(response.text);
    
                                        if(data.type == 'error') {
                                            this.sending = false;
                                            this.error = true;
                                            this.error_message = data.message;
                                            this.data = null;
                                            this.ip = null;
                                        } else {
                                            this.ip = data.message;

                                            request.get({
                                                url: '//ipwhois.app/json/' + this.ip,
                                                onResponse: (data) => {
                                                    this.sending = false;
                                                    this.data = data.json;
                                                },
                                                onError: () => {
                                                    this.sending = false;
                                                    this.error = true;
                                                    this.error_message = this.errors.invalid_url_unknown;
                                                    this.data = null;
                                                    this.ip = null;
                                                }
                                            });
                                        }
                                    },
                                    onError: () => {
                                        this.sending = false;
    
                                        this.error = true;
                                        this.error_message = this.errors.invalid_url_unknown;
                                        this.ip = null;
                                        this.data = null;
                                    }
                                })
                            } else {
                                this.error = true;
                                this.error_message = this.errors.invalid_domain;
                                this.data = null;
                                this.ip = null;
                            }
                        }
                    }
                }
            }
        }
    };
    
    })(vjax, vjaxClass)