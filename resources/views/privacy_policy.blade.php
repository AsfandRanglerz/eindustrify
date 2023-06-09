@extends('layout')
@section('title')
    <title>{{__('user.Privacy Policy')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Privacy Policy')}}">
@endsection
@section('public-content')
    <!--============================
        CUSTOM PAGES PAGE START
    ==============================-->
    <section id="wsus__product_page" class="dynamic-pg py-5">
        <div class="container">
            <div class="position-relative">
                <img src="{{ asset('public/uploads/website-images/images/privacy-policy.png') }}" class="w-100 banner-img">
                <div class="position-absolute banner-section">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item" aria-current="page">Policy</li>
                            <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
                        </ol>
                    </nav>
                    <h1 class="heading">Privacy Policy</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="text-end my-4">
                        <a href="" class="text-underline red-link">Download</a>
                    </div>
                    <h4>Privacy Policy</h4>
                    <p class="my-4 font-500">Privacy Statement</p>
                    <h6>-----</h6>
                    <p class="my-4">SECTION 1 - WHAT DO WE DO WITH YOUR INFORMATION?</p>
                    <p>When you purchase something from our store, as part of the buying and selling process, we collect the personal information you give us such as your name, address and email address.When you browse our store, we also automatically receive your computer’s internet protocol (IP) address in order to provide us with information that helps us learn about your browser and operating system.Email marketing (if applicable): With your permission, we may send you emails about our store, new products and other updates.</p>
                    <p class="my-4">SECTION 2 - CONSENT</p>
                    <h6>How do you get my consent?</h6>
                    <p>When you provide us with personal information to complete a transaction, verify your credit card, place an order, arrange for a delivery or return a purchase, we imply that you consent to our collecting it and using it for that specific reason only. If we ask for your personal information for a secondary reason, like marketing, we will either ask you directly for your expressed consent, or provide you with an opportunity to say no.</p>
                    <h6>How do I withdraw my consent?</h6>
                    <p>If after you opt-in, you change your mind, you may withdraw your consent for us to contact you, for the continued collection, use or disclosure of your information, at anytime, by contacting us at customercare@effyjewelry.com or mailing us at:Effy Jewelry 7 West 45th Street New York New York US 10036</p>
                    <p class="my-4">SECTION 3 - DISCLOSURE</p>
                    <p>We may disclose your personal information if we are required by law to do so or if you violate our Terms of Service.</p>
                    <p class="my-4">SECTION 4 - LARAVEL</p>
                    <p class="my-4">Our store is hosted on Laravel Framework. They provide us with the online e-commerce platform that allows us to sell our products and services to you.Your data is stored through Shopify’s data storage, databases and the general Laravel application. They store your data on a secure server behind a firewall.</p>
                    <p>Payment:</p>
                    <p>If you choose a direct payment gateway to complete your purchase, then Shopify stores your credit card data. It is encrypted through the Payment Card Industry Data Security Standard (PCI-DSS). Your purchase transaction data is stored only as long as is necessary to complete your purchase transaction. After that is complete, your purchase transaction information is deleted. All direct payment gateways adhere to the standards set by PCI-DSS as managed by the PCI Security Standards Council, which is a joint effort of brands like Visa, Mastercard, American Express and Discover. PCI-DSS requirements help ensure the secure handling of credit card information by our store and its service providers.For more insight, you may also want to read Shopify’s Terms of Service (https://www.shopify.com/legal/terms) or Privacy Statement (https://www.shopify.com/legal/privacy).</p>
                    <p class="my-4">SECTION 5 - THIRD-PARTY SERVICES</p>
                    <p>In general, the third-party providers used by us will only collect, use and disclose your information to the extent necessary to allow them to perform the services they provide to us.However, certain third-party service providers, such as payment gateways and other payment transaction processors, have their own privacy policies in respect to the information we are required to provide to them for your purchase-related transactions.</p>
                    <p>For these providers, we recommend that you read their privacy policies so you can understand the manner in which your personal information will be handled by these providers.</p>
                    <p>In particular, remember that certain providers may be located in or have facilities that are located a different jurisdiction than either you or us. So if you elect to proceed with a transaction that involves the services of a third-party service provider, then your information may become subject to the laws of the jurisdiction(s) in which that service provider or its facilities are located.</p>
                    <p>As an example, if you are located in Canada and your transaction is processed by a payment gateway located in the United States, then your personal information used in completing that transaction may be subject to disclosure under United States legislation, including the Patriot Act.</p>
                    <p class="mb-4">Once you leave our store’s website or are redirected to a third-party website or application, you are no longer governed by this Privacy Policy or our website’s Terms of Service.</p>

                    <b>Links</b>
                    <p>When you click on links on our store, they may direct you away from our site. We are not responsible for the privacy practices of other sites and encourage you to read their privacy statements.</p>
                    <b>Google analytics:</b>
                    <p>Our store uses Google Analytics to help us learn about store visits and the pages being viewed.</p>
                        <p class="my-4">SECTION 6 - SECURITY</p>
                        <p>To protect your personal information, we take reasonable precautions and follow industry best practices to make sure it is not inappropriately lost, misused, accessed, disclosed, altered or destroyed.
                            If you provide us with your credit card information, the information is encrypted using secure socket layer technology (SSL) and stored with a AES-256 encryption. Although no method of transmission over the Internet or electronic storage is 100% secure, we follow all PCI-DSS requirements and implement additional generally accepted industry standards.</p>
                        <p class="my-4">SECTION 7 - COOKIES</p>
                        <p>Here is a list of cookies that we use. We’ve listed them here so you that you can choose if you want to opt-out of cookies or not.
                            _session_id, unique token, sessional, Allows Laravel to store information about your session (referrer, landing page, etc).
                            _laravel_visit, no data held, Persistent for 30 minutes from the last visit, Used by our website provider’s internal stats tracker to record the number of visits_laravel_uniq, no data held, expires midnight (relative to the visitor) of the next day, Counts the number of visits to a store by a single customer.cart, unique token, persistent for 2 weeks, Stores information about the contents of your cart._secure_session_id, unique token, sessionalstorefront_digest, unique token, indefinite If the shop has a password, this is used to determine if the current visitor has access.PREF, persistent for a very short period, Set by Google and tracks who visits the store and from where</p>
                        <p class="my-4">SECTION 8 - AGE OF CONSENT</p>
                        <p>By using this site, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.</p>
                        <p class="my-4">SECTION 9 - CHANGES TO THIS PRIVACY POLICY</p>
                        <p>We reserve the right to modify this privacy policy at any time, so please review it frequently. Changes and clarifications will take effect immediately upon their posting on the website. If we make material changes to this policy, we will notify you here that it has been updated, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we use and/or disclose it.If our store is acquired or merged with another company, your information may be transferred to the new owners so that we may continue to sell products to you.</p>
                        <p class="my-4">QUESTIONS AND CONTACT INFORMATION</p>
                        <p>If you would like to: access, correct, amend or delete any personal information we have about you, register a complaint, or simply want more information contact our Privacy Compliance Officer at customercare@eIndustrify.com or by mail at eIndustrify West 45th Street Texas USA 10036</p>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        CUSTOM PAGES PAGE END
    ==============================-->
@endsection
