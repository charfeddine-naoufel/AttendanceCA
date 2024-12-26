<script src="{{asset('assets/js/alpine-collaspe.min.js')}}"></script>
        <script src="{{asset('assets/js/alpine-persist.min.js')}}"></script>
        <script defer="" src="{{asset('assets/js/alpine-ui.min.js')}}"></script>
        <script defer="" src="{{asset('assets/js/alpine-focus.min.js')}}"></script>
        <script defer="" src="{{asset('assets/js/alpine.min.js')}}"></script>
        <script src="{{asset('assets/js/custom.js')}}"></script>
        <script defer="" src="{{asset('assets/js/apexcharts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script>
            // main section
            document.addEventListener('alpine:init', () => {
                Alpine.data('scrollToTop', () => ({
                    showTopButton: false,
                    init() {
                        window.onscroll = () => {
                            this.scrollFunction();
                        };
                    },

                    scrollFunction() {
                        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                            this.showTopButton = true;
                        } else {
                            this.showTopButton = false;
                        }
                    },

                    goToTop() {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    },
                }));

                // theme customization
                Alpine.data('customizer', () => ({
                    showCustomizer: false,
                }));

                // sidebar section
                Alpine.data('sidebar', () => ({
                    init() {
                        const selector = document.querySelector('.sidebar ul a[href="' + window.location.pathname + '"]');
                        if (selector) {
                            selector.classList.add('active');
                            const ul = selector.closest('ul.sub-menu');
                            if (ul) {
                                let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                                if (ele) {
                                    ele = ele[0];
                                    setTimeout(() => {
                                        ele.click();
                                    });
                                }
                            }
                        }
                    },
                }));

                // header section
                Alpine.data('header', () => ({
                    init() {
                        const selector = document.querySelector('ul.horizontal-menu a[href="' + window.location.pathname + '"]');
                        if (selector) {
                            selector.classList.add('active');
                            const ul = selector.closest('ul.sub-menu');
                            if (ul) {
                                let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                                if (ele) {
                                    ele = ele[0];
                                    setTimeout(() => {
                                        ele.classList.add('active');
                                    });
                                }
                            }
                        }
                    },

                    notifications: [
                        {
                            id: 1,
                            profile: 'user-profile.jpeg',
                            message: '<strong class="text-sm mr-1">StarCode Kh</strong>invite you to <strong>Prototyping</strong>',
                            time: '45 min ago',
                        },
                        {
                            id: 2,
                            profile: 'profile-34.jpeg',
                            message: '<strong class="text-sm mr-1">Adam Nolan</strong>mentioned you to <strong>UX Basics</strong>',
                            time: '9h Ago',
                        },
                        {
                            id: 3,
                            profile: 'profile-16.jpeg',
                            message: '<strong class="text-sm mr-1">Anna Morgan</strong>Upload a file',
                            time: '9h Ago',
                        },
                    ],

                    messages: [
                        {
                            id: 1,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-success-light dark:bg-success text-success dark:text-success-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></span>',
                            title: 'Congratulations!',
                            message: 'Your OS has been updated.',
                            time: '1hr',
                        },
                        {
                            id: 2,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-info-light dark:bg-info text-info dark:text-info-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>',
                            title: 'Did you know?',
                            message: 'You can switch between artboards.',
                            time: '2hr',
                        },
                        {
                            id: 3,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-danger-light dark:bg-danger text-danger dark:text-danger-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>',
                            title: 'Something went wrong!',
                            message: 'Send Reposrt',
                            time: '2days',
                        },
                        {
                            id: 4,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-warning-light dark:bg-warning text-warning dark:text-warning-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">    <circle cx="12" cy="12" r="10"></circle>    <line x1="12" y1="8" x2="12" y2="12"></line>    <line x1="12" y1="16" x2="12.01" y2="16"></line></svg></span>',
                            title: 'Warning',
                            message: 'Your password strength is low.',
                            time: '5days',
                        },
                    ],

                    languages: [
                        {
                            id: 1,
                            key: 'Français',
                            value: 'fr',
                        },
                        {
                            id: 2,
                            key: 'English',
                            value: 'en',
                        },
                        {
                            id: 3,
                            key: 'Arabe',
                            value: 'ar',
                        },
                       
                    ],

                    removeNotification(value) {
                        this.notifications = this.notifications.filter((d) => d.id !== value);
                    },

                    removeMessage(value) {
                        this.messages = this.messages.filter((d) => d.id !== value);
                    },
                }));

                // finance
                Alpine.data('finance', () => ({
                    init() {
                        const bitcoin = null;
                        const ethereum = null;
                        const litecoin = null;
                        const binance = null;
                        const tether = null;
                        const solana = null;

                        setTimeout(() => {
                            this.bitcoin = new ApexCharts(this.$refs.bitcoin, this.bitcoinOptions);
                            this.bitcoin.render();

                            this.ethereum = new ApexCharts(this.$refs.ethereum, this.ethereumOptions);
                            this.ethereum.render();

                            this.litecoin = new ApexCharts(this.$refs.litecoin, this.litecoinOptions);
                            this.litecoin.render();

                            this.binance = new ApexCharts(this.$refs.binance, this.binanceOptions);
                            this.binance.render();

                            this.tether = new ApexCharts(this.$refs.tether, this.tetherOptions);
                            this.tether.render();

                            this.solana = new ApexCharts(this.$refs.solana, this.solanaOptions);
                            this.solana.render();
                        }, 300);
                    },

                    get bitcoinOptions() {
                        return {
                            series: [
                                {
                                    data: [21, 9, 36, 12, 44, 25, 59, 41, 25, 66],
                                },
                            ],
                            chart: {
                                height: 45,
                                type: 'line',
                                sparkline: {
                                    enabled: true,
                                },
                            },
                            stroke: {
                                width: 2,
                            },
                            markers: {
                                size: 0,
                            },
                            colors: ['#00ab55'],
                            grid: {
                                padding: {
                                    top: 0,
                                    bottom: 0,
                                    left: 0,
                                },
                            },
                            tooltip: {
                                x: {
                                    show: false,
                                },
                                y: {
                                    title: {
                                        formatter: (formatter = () => {
                                            return '';
                                        }),
                                    },
                                },
                            },
                            responsive: [
                                {
                                    breakPoint: 576,
                                    options: {
                                        chart: {
                                            height: 95,
                                        },
                                        grid: {
                                            padding: {
                                                top: 45,
                                                bottom: 0,
                                                left: 0,
                                            },
                                        },
                                    },
                                },
                            ],
                        };
                    },

                    get ethereumOptions() {
                        return {
                            series: [
                                {
                                    data: [44, 25, 59, 41, 66, 25, 21, 9, 36, 12],
                                },
                            ],
                            chart: {
                                height: 45,
                                type: 'line',
                                sparkline: {
                                    enabled: true,
                                },
                            },
                            stroke: {
                                width: 2,
                            },
                            markers: {
                                size: 0,
                            },
                            colors: ['#e7515a'],
                            grid: {
                                padding: {
                                    top: 0,
                                    bottom: 0,
                                    left: 0,
                                },
                            },
                            tooltip: {
                                x: {
                                    show: false,
                                },
                                y: {
                                    title: {
                                        formatter: (formatter = () => {
                                            return '';
                                        }),
                                    },
                                },
                            },
                            responsive: [
                                {
                                    breakPoint: 576,
                                    options: {
                                        chart: {
                                            height: 95,
                                        },
                                        grid: {
                                            padding: {
                                                top: 45,
                                                bottom: 0,
                                                left: 0,
                                            },
                                        },
                                    },
                                },
                            ],
                        };
                    },

                    get litecoinOptions() {
                        return {
                            series: [
                                {
                                    data: [9, 21, 36, 12, 66, 25, 44, 25, 41, 59],
                                },
                            ],
                            chart: {
                                height: 45,
                                type: 'line',
                                sparkline: {
                                    enabled: true,
                                },
                            },
                            stroke: {
                                width: 2,
                            },
                            markers: {
                                size: 0,
                            },
                            colors: ['#00ab55'],
                            grid: {
                                padding: {
                                    top: 0,
                                    bottom: 0,
                                    left: 0,
                                },
                            },
                            tooltip: {
                                x: {
                                    show: false,
                                },
                                y: {
                                    title: {
                                        formatter: (formatter = () => {
                                            return '';
                                        }),
                                    },
                                },
                            },
                            responsive: [
                                {
                                    breakPoint: 576,
                                    options: {
                                        chart: {
                                            height: 95,
                                        },
                                        grid: {
                                            padding: {
                                                top: 45,
                                                bottom: 0,
                                                left: 0,
                                            },
                                        },
                                    },
                                },
                            ],
                        };
                    },

                    get binanceOptions() {
                        return {
                            series: [
                                {
                                    data: [25, 44, 25, 59, 41, 21, 36, 12, 19, 9],
                                },
                            ],
                            chart: {
                                height: 45,
                                type: 'line',
                                sparkline: {
                                    enabled: true,
                                },
                            },
                            stroke: {
                                width: 2,
                            },
                            markers: {
                                size: 0,
                            },
                            colors: ['#e7515a'],
                            grid: {
                                padding: {
                                    top: 0,
                                    bottom: 0,
                                    left: 0,
                                },
                            },
                            tooltip: {
                                x: {
                                    show: false,
                                },
                                y: {
                                    title: {
                                        formatter: (formatter = () => {
                                            return '';
                                        }),
                                    },
                                },
                            },
                            responsive: [
                                {
                                    breakPoint: 576,
                                    options: {
                                        chart: {
                                            height: 95,
                                        },
                                        grid: {
                                            padding: {
                                                top: 45,
                                                bottom: 0,
                                                left: 0,
                                            },
                                        },
                                    },
                                },
                            ],
                        };
                    },

                    get tetherOptions() {
                        return {
                            series: [
                                {
                                    data: [21, 59, 41, 44, 25, 66, 9, 36, 25, 12],
                                },
                            ],
                            chart: {
                                height: 45,
                                type: 'line',
                                sparkline: {
                                    enabled: true,
                                },
                            },
                            stroke: {
                                width: 2,
                            },
                            markers: {
                                size: 0,
                            },
                            colors: ['#00ab55'],
                            grid: {
                                padding: {
                                    top: 0,
                                    bottom: 0,
                                    left: 0,
                                },
                            },
                            tooltip: {
                                x: {
                                    show: false,
                                },
                                y: {
                                    title: {
                                        formatter: (formatter = () => {
                                            return '';
                                        }),
                                    },
                                },
                            },
                            responsive: [
                                {
                                    breakPoint: 576,
                                    options: {
                                        chart: {
                                            height: 95,
                                        },
                                        grid: {
                                            padding: {
                                                top: 45,
                                                bottom: 0,
                                                left: 0,
                                            },
                                        },
                                    },
                                },
                            ],
                        };
                    },

                    get solanaOptions() {
                        return {
                            series: [
                                {
                                    data: [21, -9, 36, -12, 44, 25, 59, -41, 66, -25],
                                },
                            ],
                            chart: {
                                height: 45,
                                type: 'line',
                                sparkline: {
                                    enabled: true,
                                },
                            },
                            stroke: {
                                width: 2,
                            },
                            markers: {
                                size: 0,
                            },
                            colors: ['#e7515a'],
                            grid: {
                                padding: {
                                    top: 0,
                                    bottom: 0,
                                    left: 0,
                                },
                            },
                            tooltip: {
                                x: {
                                    show: false,
                                },
                                y: {
                                    title: {
                                        formatter: (formatter = () => {
                                            return '';
                                        }),
                                    },
                                },
                            },
                            responsive: [
                                {
                                    breakPoint: 576,
                                    options: {
                                        chart: {
                                            height: 95,
                                        },
                                        grid: {
                                            padding: {
                                                top: 45,
                                                bottom: 0,
                                                left: 0,
                                            },
                                        },
                                    },
                                },
                            ],
                        };
                    },
                }));
            });
        </script>
       