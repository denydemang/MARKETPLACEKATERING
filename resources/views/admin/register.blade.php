<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet"
        href="{{ asset('assets/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }} ">

    <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/jqvmap/jqvmap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/AdminLTE/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet"
        href="{{ asset('assets/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/summernote/summernote-bs4.min.css') }} ">
    <script nonce="fe0076c6-114d-4e29-8c3b-8f66164d8aa9">
        try {
            (function(w, d) {
                ! function(bk, bl, bm, bn) {
                    if (bk.zaraz) console.error("zaraz is loaded twice");
                    else {
                        bk[bm] = bk[bm] || {};
                        bk[bm].executed = [];
                        bk.zaraz = {
                            deferred: [],
                            listeners: []
                        };
                        bk.zaraz._v = "5807";
                        bk.zaraz._n = "fe0076c6-114d-4e29-8c3b-8f66164d8aa9";
                        bk.zaraz.q = [];
                        bk.zaraz._f = function(bo) {
                            return async function() {
                                var bp = Array.prototype.slice.call(arguments);
                                bk.zaraz.q.push({
                                    m: bo,
                                    a: bp
                                })
                            }
                        };
                        for (const bq of ["track", "set", "debug"]) bk.zaraz[bq] = bk.zaraz._f(bq);
                        bk.zaraz.init = () => {
                            var br = bl.getElementsByTagName(bn)[0],
                                bs = bl.createElement(bn),
                                bt = bl.getElementsByTagName("title")[0];
                            bt && (bk[bm].t = bl.getElementsByTagName("title")[0].text);
                            bk[bm].x = Math.random();
                            bk[bm].w = bk.screen.width;
                            bk[bm].h = bk.screen.height;
                            bk[bm].j = bk.innerHeight;
                            bk[bm].e = bk.innerWidth;
                            bk[bm].l = bk.location.href;
                            bk[bm].r = bl.referrer;
                            bk[bm].k = bk.screen.colorDepth;
                            bk[bm].n = bl.characterSet;
                            bk[bm].o = (new Date).getTimezoneOffset();
                            if (bk.dataLayer)
                                for (const bx of Object.entries(Object.entries(dataLayer).reduce(((by, bz) => ({
                                        ...by[1],
                                        ...bz[1]
                                    })), {}))) zaraz.set(bx[0], bx[1], {
                                    scope: "page"
                                });
                            bk[bm].q = [];
                            for (; bk.zaraz.q.length;) {
                                const bA = bk.zaraz.q.shift();
                                bk[bm].q.push(bA)
                            }
                            bs.defer = !0;
                            for (const bB of [localStorage, sessionStorage]) Object.keys(bB || {}).filter((bD => bD
                                .startsWith("_zaraz_"))).forEach((bC => {
                                try {
                                    bk[bm]["z_" + bC.slice(7)] = JSON.parse(bB.getItem(bC))
                                } catch {
                                    bk[bm]["z_" + bC.slice(7)] = bB.getItem(bC)
                                }
                            }));
                            bs.referrerPolicy = "origin";
                            bs.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bk[bm])));
                            br.parentNode.insertBefore(bs, br)
                        };
                        ["complete", "interactive"].includes(bl.readyState) ? zaraz.init() : bk.addEventListener(
                            "DOMContentLoaded", zaraz.init)
                    }
                }(w, d, "zarazData", "script");
                window.zaraz._p = async j => new Promise((k => {
                    if (j) {
                        j.e && j.e.forEach((l => {
                            try {
                                const m = d.querySelector("script[nonce]"),
                                    n = m?.nonce || m?.getAttribute("nonce"),
                                    o = d.createElement("script");
                                n && (o.nonce = n);
                                o.innerHTML = l;
                                o.onload = () => {
                                    d.head.removeChild(o)
                                };
                                d.head.appendChild(o)
                            } catch (p) {
                                console.error(`Error executing script: ${l}\n`, p)
                            }
                        }));
                        Promise.allSettled((j.f || []).map((q => fetch(q[0], q[1]))))
                    }
                    k()
                }));
                zaraz._p({
                    "e": ["(function(w,d){})(window,document)"]
                });
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
</head>

<body class="d-flex justify-content-center align-items-center h-100 py-50">

    <div class="w-50 mt-50">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>
                <form action="{{ route('admin.postregistermerchant') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username"
                            value="{{ old('username') }}">
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email"
                            value="{{ old('email') }}">
                        <br>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            value="{{ old('password') }}">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Address" name="address"
                            value="{{ old('address') }}">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Contact Number" name="contact_number"
                            value="{{ old('contact_number') }}">
                        @error('contact_number')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <h5 class="text-center"> -----Company Section ----</h5>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Company Name" name="companyname"
                            value="{{ old('companyname') }}">
                        @error('companyname')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Company Contacts" name="companycontact"
                            value="{{ old('companycontact') }}">
                        @error('companycontact')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Company Description"
                            name="companydescription" value="{{ old('companydescription') }}">
                        @error('companydescription')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Company Address" name="companyaddress"
                            value="{{ old('companyaddress') }}">
                        @error('companyaddress')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>


    <script src="{{ asset('assets/AdminLTE/plugins/jquery/jquery.min.js') }} "></script>

    <script src="{{ asset('assets/AdminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="{{ asset('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>

    <script src="{{ asset('assets/AdminLTE/plugins/sparklines/sparkline.js') }} "></script>

    <script src="{{ asset('assets/AdminLTE/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

    <script src="{{ asset('assets/AdminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

    <script src="{{ asset('assets/AdminLTE/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('assets/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>

    <script src="{{ asset('assets/AdminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script src="{{ asset('assets/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    <script src="{{ asset('assets/AdminLTE/dist/js/adminlte.js') }}"></script>

    <script src="{{ asset('assets/AdminLTE/dist/js/pages/dashboard.js') }}"></script>
</body>

</html>
