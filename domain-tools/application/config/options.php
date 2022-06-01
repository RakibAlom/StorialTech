<?php defined('BASEPATH') || exit('Access Denied.');

$config['options'] = array(
    'table' => 'options',
    'cache' => 'options',

    'sections' => array(
        'general' => array(
            'name' => 'General',
            'icon' => 'settings',
            'title' => 'General Settings',
            'description' => 'Configure the General Settings for your Website',
            'fields' => array(
                'logo' => [
                    'label' => 'Logo',
                    'description' => 'The logo for the website.',
                    'type' => 'image',
                    'default' => '/uploads/default/logo.png',

                    'escape_html' => false,
                    'xss_clean' => false
                ],
                'favicon' => [
                    'label' => 'Favicon',
                    'description' => 'The favicon for the website.',
                    'type' => 'image',
                    'default' => '/uploads/default/favicon.png',

                    'escape_html' => false,
                    'xss_clean' => false
                ],
                'website-title' => [
                    'label' => 'Website Title',
                    'description' => 'This is the name of the website, shown to end-users.',
                    'type' => 'text',
                    'default' => 'Domainer',
                    'placeholder' => 'Domain Tools Script',
    
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ]
                ],
                'website-description' => [
                    'label' => 'Description',
                    'description' => 'Describe your website. This may also appear on Search Engines',
                    'type' => 'textarea',
                    'default' => 'Domainer is an application created by Bitflan that gives you access to various Domain Tools.',
                    'placeholder' => 'A concise description of your Website.',

                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ]
                ],

                'footer-attribution' => [
                    'label' => 'Footer Attribution',
                    'description' => 'Change the Footer Attribution on your Website.',
                    'type' => 'textarea',
                    'default' => 'Copyright © 2021 Bitflan. All Rights Reserved.',
                    'placeholder' => 'Copyright © 2021 Company LLC',
                ],

                'custom-tags' => [
                    'label' => 'Custom HTML',
                    'description' => 'Insert some custom HTML to your <code><head></code> tag.',
                    'type' => 'textarea',
                    'default' => '',
                    'placeholder' => 'Enter some content to be inserted in the head tag.',
                ]
            )
        ),
        'ads' => array(
            'name' => 'Ad Spots',
            'icon' => 'monitor',
            'title' => 'Ad Spots',
            'description' => 'Configure the Ads for the Pre-defined Ad Spots on your Website.',
            'fields' => array(
                'header-ad-status' => array(
                    'label' => 'Enable Header Ad Spot',
                    'description' => 'Enable / Disable the Header Advertisement Spot',
                    'type' => 'switch',
                    'default' => false,
                    'before_html' => '<div class="alert alert-info">Ad-blocker Software may prevent you from using this page properly or viewing the ads on your website. Make sure to disable ad-blockers when working with this page.</div><div class="row"><div class="col-4">',
                ),
                'header-ad-code' => array(
                    'label' => 'Header Ad Code',
                    'description' => 'The Ad Code to insert in the Header Ad Spot.',
                    'placeholder' => 'Ad Code Here',
                    'type' => 'textarea',
                    'default' => '',
                    'after_html' => "</div>",
					
					'escape_html' => false,
                    'xss_clean' => false
                ),
                'middle-ad-status' => array(
                    'label' => 'Enable Middle Ad Spot',
                    'description' => 'Enable / Disable the Middle Advertisement Spot',
                    'type' => 'switch',
                    'default' => false,
                    "before_html" => '<div class="col-4">'
                ),
                'middle-ad-code' => array(
                    'label' => 'Middle Ad Code',
                    'description' => 'The Ad Code to insert in the Middle Ad Spot.',
                    'placeholder' => 'Ad Code Here',
                    'type' => 'textarea',
                    'default' => '',
                    "after_html" => '</div>',
					
					'escape_html' => false,
                    'xss_clean' => false
                ),
                'footer-ad-status' => array(
                    'label' => 'Enable Footer Ad Spot',
                    'description' => 'Enable / Disable the Footer Advertisement Spot',
                    'type' => 'switch',
                    'default' => false,
                    "before_html" => '<div class="col-4">'
                ),
                'footer-ad-code' => array(
                    'label' => 'Footer Ad Code',
                    'description' => 'The Ad Code to insert in the Footer Ad Spot.',
                    'placeholder' => 'Ad Code Here',
                    'type' => 'textarea',
                    'default' => '',
                    "after_html" => '</div></div>',
					
					'escape_html' => false,
                    'xss_clean' => false
                ),
                'pop-ad-status' => array(
                    'label' => 'Enable Pop Ad',
                    'description' => 'Enable / Disable the Pop Ad',
                    'type' => 'switch',
                    'default' => false
                ),
                'pop-ad-code' => array(
                    'label' => 'Pop Ad Code',
                    'description' => 'The Ad Code to insert as a Pop Ad.',
                    'placeholder' => 'Ad Code Here',
                    'type' => 'textarea',
                    'default' => '',
					
					'escape_html' => false,
                    'xss_clean' => false
                ),
            )
        ),
        'assets' => array(
            'name' => 'Additional Assets',
            'icon' => 'code',
            'title' => 'Additional Assets',
            'description' => 'Add Additional CSS / JS in your website.',
            'fields' => array(
                'additional-css' => array(
                    'label' => 'CSS',
                    'description' => 'Add additional stylesheets to your website.',
                    'type' => 'repeater',
                    'title' => 'name',
                    'default' => [],
                    'fields' => [
                        'name' => [
                            'label' => 'Name',
                            'description' => 'The name of this stylesheet for reference.',
                            'type' => 'text',
                            'placeholder' => 'Custom Styles',
                            'default' => 'Custom Stylesheet',

                            'validation' => [
                                'rules' => 'required',
                                'errors' => [
                                    'required' => 'Stylesheet name is Required'
                                ]
                            ]
                        ],
                        'href' => [
                            'label' => 'Link',
                            'description' => 'The link to the stylesheet. You may need to create & upload this stylesheet.',
                            'type' => 'text',
                            'placeholder' => 'https://website.com/assets/style.css',

                            'validation' => [
                                'rules' => 'required',
                                'errors' => [
                                    'required' => 'Stylesheet link is Required'
                                ]
                            ]
                        ],
                        'status' => [
                            'label' => 'Status',
                            'description' => 'Enable or Disable this Stylesheet',
                            'type' => 'switch',
                            'default' => true
                        ]
                    ]
                ),
                'additional-js' => array(
                    'label' => 'JS',
                    'description' => 'Add additional scripts to your website.',
                    'type' => 'repeater',
                    'title' => 'name',
                    'default' => [],
                    'fields' => [
                        'name' => [
                            'label' => 'Name',
                            'description' => 'The name of this script for reference.',
                            'type' => 'text',
                            'placeholder' => 'Custom Script',
                            'default' => 'Custom Script',

                            'validation' => [
                                'rules' => 'required',
                                'errors' => [
                                    'required' => 'Script name is Required'
                                ]
                            ]
                        ],
                        'src' => [
                            'label' => 'Link',
                            'description' => 'The link to the script. You may need to create & upload this script.',
                            'type' => 'text',
                            'placeholder' => 'https://website.com/assets/script.js',

                            'validation' => [
                                'rules' => 'required',
                                'errors' => [
                                    'required' => 'Script link is Required'
                                ]
                            ]
                        ],
                        'position' => [
                            'label' => 'Position',
                            'description' => 'Configure the placement for this Script.',
                            'type' => 'select',
                            'choices' => [
                                'header' => 'Header',
                                'Footer' => 'Footer',
                            ],

                            'validation' => [
                                'rules' => 'required|in_list[header,footer]',
                                'errors' => [
                                    'required' => 'Position is Required',
                                    'in_list' => 'Invalid Script Placement'
                                ]
                            ]
                        ],
                        'status' => [
                            'label' => 'Status',
                            'description' => 'Enable or Disable this Script',
                            'type' => 'switch',
                            'default' => true
                        ]
                    ]
                ),
                'custom-css' => [
                    'label' => 'Custom Inline CSS',
                    'description' => 'This CSS will be printed as-is in the header of your website.',
                    'type' => 'textarea',
                    'placeholder' => 'CSS Code Here'
                ],
                'google-analytics-id' => [
                    'label' => 'Google Analytics ID',
                    'description' => 'Specify your ID to Enable analytics on your website.',
                    'type' => 'text',
                    'placeholder' => 'Your Analytics ID'
                ]
            )
        ),

        'contact' => array(
            'name' => 'Contact Settings',
            'icon' => 'mail',
            'title' => 'Contact Settings',
            'description' => 'Modify the Contact Page Settings of your Website.',
            'fields' => array(
                'contact-page-status' => [
                    'label' => 'Enable Contact Page',
                    'description' => 'Set the status of the Contact Page',
                    'type' => 'switch',
                    'default' => true
                ],
                'contact-page-image' => [
                    'label' => 'Contact Page Graphic',
                    'description' => 'Add an Illustration to the Contact Page.',
                    'type' => 'image',
                    'default' => 'uploads/default/contact.svg',

                    'escape_html' => false,
                    'xss_clean' => false
                ],

                'contact-email' => [
                    'label' => 'Contact E-Mail',
                    'description' => 'Contact Form Messages will be sent to this E-Mail',
                    'type' => 'text',
                    'default' => 'admin@flanwork.com',
                    'placeholder' => 'Your Contact E-Mail',

                    'validation' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Contact E-Mail is Required.'
                        ]
                    ]
                ],

                'smtp-status' => [
                    'label' => 'SMTP Status',
                    'description' => 'Enable / Disable SMTP for E-Mail Sending',
                    'type' => 'switch',
                    'default' => false
                ],

                'smtp-host' => [
                    'label' => 'SMTP Host',
                    'description' => 'The Host for the SMTP to use.',
                    'type' => 'text',
                    'placeholder' => 'smtp.myhost.com'
                ],
                'smtp-port' => [
                    'label' => 'SMTP Port',
                    'description' => 'The Port for the SMTP.',
                    'type' => 'number',
                    'placeholder' => 'Your SMTP Port',
                    'default' => 25
                ],
                'smtp-username' => [
                    'label' => 'SMTP Username',
                    'description' => 'The SMTP Login Username',
                    'type' => 'text',
                    'placeholder' => 'Your SMTP Username',

                    'before_html' => '<div class="row"><div class="col-6">'
                ],
                'smtp-password' => [
                    'label' => 'SMTP Password',
                    'description' => 'The SMTP Login Password',
                    'type' => 'text',
                    'placeholder' => 'Your SMTP Password',
                    
                    'before_html' => '</div><div class="col-6">',
                    'after_html' => '</div></div>'
                ],
            )
        ),
        'api' => array(
            'name' => 'API Settings',
            'icon' => 'key',
            'title' => 'API Settings',
            'description' => 'Edit the API Keys for Google Recaptcha & ExchangeRate-API.',

            'fields' => array(
                'recaptcha-status' => [
                    'label' => 'Enable Captcha',
                    'description' => 'Set the status of the Captcha',
                    'type' => 'switch',
                    'default' => false,
                    'after_html' => '<div class="mt-2 alert alert-info">You can get Recaptcha v2 Checkbox API Keys from the <a target="_blank" href="https://www.google.com/recaptcha/admin/">Google API Console</a>.</div>'
                ],

                'recaptcha-site-key' => [
                    'label' => 'Recaptcha Site Key',
                    'description' => 'Your Recaptcha Site Key provided by Google',
                    'type' => 'text',
                    'default' => '',
                    'placeholder' => 'Your Recaptcha Site Key',
                ],
                'recaptcha-secret-key' => [
                    'label' => 'Recaptcha Secret Key',
                    'description' => 'Your Recaptcha Secret Key provided by Google',
                    'type' => 'text',
                    'default' => '',
                    'placeholder' => 'Your Recaptcha Secret Key',
                ],

                'exchangerate-api-status' => [
                    'label' => 'Enable ExchangeRate-API',
                    'description' => 'Actiate or Deactivate ExchangeRate-API for Price Conversions',
                    'type' => 'switch',
                    'default' => false,

                    'before_html' => '<div class="mt-2 alert alert-info">The ExchangeRate API is used to update Currency Rates on your website. Get a Free API Key from <a target="_blank" href="https://www.exchangerate-api.com/">Here</a>.</div>'
                ],
                'exchangerate-api-key' => [
                    'label' => 'ExchangeRate-API  Key',
                    'description' => 'Your ExchangeRate API Key for Currency Rates.',
                    'type' => 'text',
                    'default' => '',
                    'placeholder' => 'Your API Key',
                ]
            )
        ),
        'currencies' => array(
            'name' => 'Currency Settings',
            'title' => 'Currency Settings',
            'description' => 'Change the currency settings on your website.',
            'icon' => 'dollar-sign',

            'fields' => [
                'enable-currency-selection' => [
                    'label' => 'Enable Currency Selection',
                    'description' => 'Actiate or Deactivate Currency Selection',
                    'type' => 'switch',
                    'default' => true,
                    
                    'before_html' => '<div class="alert alert-info">For these settings to function, <strong>ExchangeRate-API</strong> must be enabled in API Settings.</div>'
                ]
            ]
        ),
        'features_faqs' => array(
            'name' => 'Features & FAQs',
            'icon' => 'monitor',
            'title' => 'Features & FAQs',
            'description' => 'Add / Remove Features & FAQs from your Website.',

            'fields' => array(
                'homepage-features' => array(
                    'label' => 'Features',
                    'description' => 'Add / Remove Features from your Website.',
                    'type' => 'repeater',
                    'title' => 'name',
                    'fields' => [
                        'name' => [
                            'label' => 'Name',
                            'description' => 'The Name of the Feature.',
                            'type' => 'text',
                            'placeholder' => 'Feature Name',
                            'default' => 'My New Feature',

                            'validation' => [
                                'rules' => 'required',
                                'errors' => [
                                    'required' => 'Feature Name is Required'
                                ]
                            ]
                        ],
                        'description' => [
                            'label' => 'Description',
                            'description' => 'The description of the feature.',
                            'type' => 'textarea',
                            'placeholder' => 'A concise description of the feature...',
                            'default' => 'This is my new Feature',
                            'attributes' => [
                                'x-init' => 'CKEDITOR.replace($el)'
                            ],
                            'validation' => [
                                'rules' => 'required',
                                'errors' => [
                                    'required' => 'Feature Description is Required'
                                ]
                            ]
                        ],
                        'image' => [
                            'label' => 'Image',
                            'description' => 'The graphical illustration for this feature.',
                            'type' => 'image',
                            'default' => 'uploads/homepage-features/domain-search.svg'
                        ]
                    ],
                    'default' => [
                        [
                            'name' => 'Check Domain Availability',
                            'description' => 'Check whether a Domain Name is available for registration or not via our Domain Search Tool.',
                            'image' => 'uploads/default/homepage-features/domain-search.svg'
                        ],
                        [
                            'name' => 'Find Domain Owner & Information',
                            'description' => 'Use the WHOIS Information tool to find out a domain\'s owner, location, ip and other information.',
                            'image' => 'uploads/default/homepage-features/domain-whois.svg'
                        ],
                        [
                            'name' => 'Find out Domain Expiry',
                            'description' => 'Looking out for a domain name that you want to claim? Learn when a domain will expire with our whois & search tools.',
                            'image' => 'uploads/default/homepage-features/domain-expiry.svg'
                        ]
                    ]
                ),
                'homepage-faqs' => [
                    'label' => 'FAQs',
                    'description' => 'Add / Remove FAQs from your Website.',
                    'type' => 'repeater',
                    'title' => 'title',
                    'fields' => [
                        'title' => [
                            'label' => 'Title',
                            'description' => 'The title of the FAQ.',
                            'type' => 'text',
                            'placeholder' => 'FAQ Title',
                            'default' => 'My New FAQ',
                            'validation' => [
                                'rules' => 'required',
                                'errors' => [
                                    'required' => 'FAQ Title is Required.'
                                ]
                            ]
                        ],
                        'description' => [
                            'label' => 'Description',
                            'description' => 'The description of the FAQ.',
                            'type' => 'textarea',
                            'placeholder' => 'FAQ Description here...',
                            'default' => 'This is my New FAQ.',
                            'attributes' => [
                                'x-init' => 'CKEDITOR.replace($el)'
                            ],
                            'validation' => [
                                'rules' => 'required',
                                'errors' => [
                                    'required' => 'FAQ Description is Required.'
                                ]
                            ]
                        ],
                    ],

                    'default' => [
                        [
                            'title' => 'How do I search a domain name?',
                            'description' => 'Simply use the Domain Search tool above. Type in the domain name in the search box and click on "Search"'
                        ],
                        [
                            'title' => 'How do I generate domain names?',
                            'description' => 'Use the Domain Generator tool. Type in a key-word and you will receive many suggestions back.'
                        ],
                        [
                            'title' => 'How can I find out who owns a domain?',
                            'description' => 'You can find out a domain\'s ownership using the WHOIS Information tool above.'
                        ],
                        [
                            'title' => 'Where can I find when a domain expires?',
                            'description' => 'You can use the WHOIS Information tool and check the domain-name to see when it will expire.'
                        ],
                        [
                            'title' => 'How do I find the location of an IP or Domain?',
                            'description' => 'To find the Location of an IP / Domain, you can use the IP Lookup & Domain Location tools.'
                        ],
                        [
                            'title' => 'Where can I see the DNS Records of a Domain?',
                            'description' => 'Use the DNS Lookup tool and type in your Domain Name.'
                        ]
                    ]
                ]
            )
        ),
        'links' => array(
            'name' => 'Header / Footer Links',
            'icon' => 'external-link',
            'title' => 'Header / Footer Links',
            'description' => 'Add or Remove Links from the Header or Footer of your website.',

            'fields' => array(
                'hf-links' => [
                    'label' => 'Items',
                    'description' => 'Add / Remove Links',
                    'type' => 'repeater',
                    'default' => [],
                    'title' => 'title',
                    'fields' => [
                        'title' => [
                            'label' => 'Title',
                            'description' => 'Name of the Link to be displayed.',
                            'type' => 'text',
                            'default' => 'My New Link',
                            'placeholder' => 'Enter the link name to be displayed to the users.'
                        ],
                        'href' => [
                            'label' => 'Location',
                            'description' => 'User will go to this link after clicking your link.',
                            'type' => 'text',
                            'default' => '',
                            'placeholder' => 'https://somewhere.com/page'
                        ],
                        'placement' => [
                            'label' => 'Placement',
                            'description' => 'Where to place this link.',
                            'type' => 'select',
                            'default' => 'both',
                            'choices' => [
                                'both' => 'Both',
                                'header' => 'Header',
                                'footer' => 'Footer'
                            ]
                        ],
                        'new-tab' => [
                            'label' => 'New Tab',
                            'description' => 'Should this link open in a new Tab or Not.',
                            'default' => true,
                            'type' => 'switch'
                        ]
                    ]
                ]
            )
        ),
        'tld_settings' => array(
            'name' => 'TLD Settings / Tools',
            'icon' => 'tool',
            'title' => 'TLD Settings & Tools',
            'description' => 'Configure how TLDs behave on your Website.',

            'fields' => array(
                'tld-price-status' => [
                    'label' => 'Show TLD Price',
                    'description' => 'Enable / Disable the appearance of Prices on Domain Search.',
                    'type' => 'switch',
                    'default' => true
                ],
                'homepage-tlds' => [
                    'label' => 'Maximum number of TLDs to show on Homepage on Search',
                    'description' => 'Load More will be showed if activated TLDs exceed this number',
                    'type' => 'number',
                    'default' => '15',
                    'placeholder' => 'If the activated TLDs exceed this amount, they will be paginated.'
                ]
            )
        )
    )
);