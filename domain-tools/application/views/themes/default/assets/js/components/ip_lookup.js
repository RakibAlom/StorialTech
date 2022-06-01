(function(request, requestClass) {"use strict";
    
    window.bitflan = {
        components: {
            ip_lookup_component: function() {
                return {
                    domain: '',
                    errors: {},
                    error: false,
                    error_message: '',
                    sending: false,
                    data: null,
            
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
                                request.get({
                                    url: '//ipwhois.app/json/' + this.domain,

                                    onSend: () => this.sending = true,
                                    
                                    onResponse: (data) => {
                                        if(data.json.success) {
                                            request.post({
                                                url: window.bitflan_baseUrl + 'ip_lookup/query',
                                                data: {
                                                    ip: this.domain
                                                },
                                                onResponse: (hostname) => {
                                                    hostname = JSON.parse(hostname.text);

                                                    if(hostname.type == 'success') {
                                                        this.data = {hostname: hostname.message, ...data.json}
                                                        this.sending = false;
                                                    } else {
                                                        this.sending = false;
                                                        this.error = true;
                                                        this.error_message = hostname.message;
                                                        this.data = null;
                                                    }
                                                }
                                            })
                                        } else {
                                            this.sending = false;
                                            this.error = true;
                                            this.error_message = this.errors.unknown_ip;
                                            this.data = null;
                                        }
                                    },
                                    onError: () => {
                                        this.sending = false;
                                        this.error = true;
                                        this.error_message = this.errors.invalid_ip;
                                        this.data = null;
                                    }
                                });
                            } else {
                                this.error = true;
                                this.error_message = this.errors.invalid_ip;
                                this.data = null;
                            }
                        }
                    }
                }
            }
        }
    };
    
    })(vjax, vjaxClass)