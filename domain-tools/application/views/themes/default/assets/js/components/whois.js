(function(request, requestClass) {"use strict";
    
    window.bitflan = {
        components: {
            whois_component: function() {
                return {
                    domain: '',
                    errors: {},
                    error: false,
                    error_message: '',
                    sending: false,
                    available: false,
                    data: null,
                    prevDomain: null,
                    link: null,
                    price: null,
            
                    init(domain, errorMessages) {
                        this.errors = errorMessages;

                        this.$watch('domain', () => {
                            this.error = false;
                            this.error_message = '';
                        });
                        
                        if(domain) {
                            this.domain = domain;

                            this.submit();
                        }
                    },
            
                    domain_check() { 
                        return this.domain.includes('.');
                    },
    
                    submit() {
                        if(!this.sending) {
                            if(this.domain.length && this.domain_check()) {
                                request.post({
                                    url: window.bitflan_baseUrl + 'whois/query',
                                    data: {
                                        url: this.domain
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
                                        } else if(data.type == 'success') {
                                            this.data = data.message;
                                        } else {
                                            this.available = true;
                                            this.price = data.price;
                                            this.link  = data.link;
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