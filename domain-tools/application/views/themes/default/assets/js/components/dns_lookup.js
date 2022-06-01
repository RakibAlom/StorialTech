(function(request, requestClass) {"use strict";

window.bitflan = {
    components: {
        dns_lookup_component: function() {
            return {
                domain: '',
                errors: {},
                error: false,
                error_message: '',
                sending: false,
                data: [],
        
                async init(errorMessages) {
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
                                url: window.bitflan_baseUrl + 'dns_lookup/query',
                                data: {
                                    url: this.domain
                                },

                                onSend: () => this.sending = true,

                                onResponse: (response) => {
                                    const data = JSON.parse(response.text);

                                    this.sending = false;

                                    if(data.type == 'error') {
                                        this.error = true;
                                        this.error_message = data.message;
                                    } else {
                                        this.data = data.message;
                                    }
                                },
                                onError: () => {
                                    this.sending = false;

                                    this.error = true;
                                    this.error_message = this.errors.invalid_url_unknown;
                                }
                            })
                        } else {
                            this.error = true;
                            this.error_message = this.errors.invalid_domain;
                        }
                    }
                }
            }
        }
    }
};

})(vjax, vjaxClass)