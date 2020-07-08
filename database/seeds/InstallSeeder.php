<?php

use App\Country;
use App\Setting;
use Illuminate\Database\Seeder;

class InstallSeeder extends Seeder
{
    const FREE_PLAN_ID = 1;
    const ADMIN_PLAN_ID = 2;
    const TOTAL_USERS = 5;
    /**
     * Run the database seeds for installation process
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        /**
         * Pre-defined roles
         */
        DB::table('roles')->insert([
            [
                // role_id = 1
                'name'          => 'Admin',
                'slug'          => 'admin',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                // role_id = 3
                'name'          => 'User',
                'slug'          => 'user',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ]
        ]);

        /**
         * Testimonials
         */
        DB::table('testimonials')->insert([
            [
                'testimonial_name' => "Liam Kaufman",
                'testimonial_company' => "Project Studio Solutions",
                'testimonial_job_title' => "Founder",
                'testimonial_description' => "I found this tool really easy to use - between the forums and their installation tips it only took me 5 minutes to install (which is impressive because I'm new to this stuff).",
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ]
        ]);

        DB::table('testimonials')->insert([
            [
                'testimonial_name' => "Jeff Dawson",
                'testimonial_company' => "JD Web Publishing",
                'testimonial_job_title' => 'CEO',
                'testimonial_description' => "I was using a Windows program that would automatically generate and FTP the sitemap, but I still had to be there to run the program. With your script, I no longer need to waste my time doing that. Thank you.",
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ]
        ]);

        DB::table('testimonials')->insert([
            [
                'testimonial_name' => 'Bette Brennan',
                'testimonial_company' => 'Forayweb',
                'testimonial_job_title' => 'Tech Lead',
                'testimonial_description' => 'What a wonderful tool! The Standalone Sitemap Generator is a must-have for any serious web professional. I\'m not exaggerating when I say that this product will save me several days work in the course of an average month.',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ]
        ]);

        /**
         * Faqs
         */
        DB::table('faqs')->insert([
            [
                'faqs_question' => 'How to list my item?',
                'faqs_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.',
                'faqs_order' => 1,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ]
        ]);
        DB::table('faqs')->insert([
            [
                'faqs_question' => 'Is this available in my country?',
                'faqs_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.',
                'faqs_order' => 2,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ]
        ]);
        DB::table('faqs')->insert([
            [
                'faqs_question' => 'Is it free?',
                'faqs_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.',
                'faqs_order' => 3,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ]
        ]);
        DB::table('faqs')->insert([
            [
                'faqs_question' => 'How the system works?',
                'faqs_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.',
                'faqs_order' => 4,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ]
        ]);

        /**
         * Social Media
         */
        DB::table('social_medias')->insert([
            [
                'social_media_name' => 'Facebook',
                'social_media_icon' => 'fab fa-facebook-f',
                'social_media_link' => 'https://facebook.com',
                'social_media_order' => 1,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ]
        ]);
        DB::table('social_medias')->insert([
            [
                'social_media_name' => 'Twitter',
                'social_media_icon' => 'fab fa-twitter',
                'social_media_link' => 'https://twitter.com',
                'social_media_order' => 2,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ]
        ]);
        DB::table('social_medias')->insert([
            [
                'social_media_name' => 'Instagram',
                'social_media_icon' => 'fab fa-instagram',
                'social_media_link' => 'https://instagram.com',
                'social_media_order' => 3,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ]
        ]);
        DB::table('social_medias')->insert([
            [
                'social_media_name' => 'LinkedIn',
                'social_media_icon' => 'fab fa-linkedin-in',
                'social_media_link' => 'https://linkedin.com',
                'social_media_order' => 4,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ]
        ]);

        /**
         * Import location of United States
         */
        DB::unprepared(File::get(__DIR__ . '/sql/cities_us_1.sql'));
        DB::unprepared(File::get(__DIR__ . '/sql/cities_us_2.sql'));
        DB::unprepared(File::get(__DIR__ . '/sql/cities_us_3.sql'));
        DB::unprepared(File::get(__DIR__ . '/sql/cities_us_4.sql'));
        DB::unprepared(File::get(__DIR__ . '/sql/cities_us_5.sql'));

        /**
         * Website settings
         */
        DB::table('settings')->insert([
            [
                'setting_site_name' => config('app.name', 'Directory Hub'),
                'setting_site_email' => 'email@example.com',
                'setting_site_phone' => '+1 232 3235 324',
                'setting_site_address' => '2345 Garyson Street',
                'setting_site_state' => 'New York',
                'setting_site_city' => 'White Plains',
                'setting_site_country' => 'United States', // United States
                'setting_site_postal_code' => '98765',
                'setting_site_about' => 'Directory Hub is a business listing and classified platform, where people can post local business, buy and sell, and more.',

                'setting_site_location_lat' => 31.89160000,
                'setting_site_location_lng' => -97.06710000,
                'setting_site_location_country_id' => 100,

                'setting_site_seo_home_title' => 'Restaurants, Dentists, Bars, Beauty Salons, Doctors',
                'setting_site_seo_home_description' => 'User Reviews and Recommendations of Best Restaurants, Shopping, Nightlife, Food, Entertainment, Things to Do, Services and More',
                'setting_site_seo_home_keywords' => 'recommendation,local,business,review,friend,restaurant,dentist,doctor,salon,spa,shopping,store,share,community,massage,sushi,pizza,nails',

                'setting_page_about_enable' => Setting::ABOUT_PAGE_ENABLED,
                'setting_page_about' => "<h2>Shaping the Future of Business</h2><p>We are committed to nurturing a neutral platform and are helping business establishments maintain high standards.<br></p><p><br></p><h2>Who Are We?</h2><p>Welcome to Listing Plus, your number one source for all things. We're dedicated to giving you the very best of business information.</p><p>Listing Plus has come a long way from its beginnings. When first started out, our passion for business growing drove them so that Listing Plus can now serve customers all over the world, and are thrilled that we're able to turn our passion into our own website.</p><p>We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.</p><p><br></p><h2>Our Values</h2><p><br></p><h3>Resilience</h3><p>We push ourselves beyond our abilities when faced with tough times. When we foresee uncertainty, we address it only with flexibility.</p><p><br></p><h3>Acceptance</h3><p>Feedback is never taken personally, we break it into positive pieces and strive to work on each and every element even more effectively.</p><p><br></p><h3>Humility</h3><p>It’s always ‘us’ over ‘me’. We don’t lose ourselves in pride or confidence during individual successes but focus on being our simple selves in every which way.</p><p><br></p><h3>Spark</h3><p>We believe in, stand for, and are evangelists of our culture - both, within Zomato and externally with all our stakeholders.</p><p><br></p><h3>Judgment</h3><p>It’s not our abilities that show who we truly are - it’s our choices. We aim to get these rights, at least in the majority of the cases.</p>",

                'setting_page_terms_of_service_enable' => Setting::TERM_PAGE_ENABLED,
                'setting_page_terms_of_service' => "<p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Please read these terms of service (\"terms\", \"terms of service\") carefully before using [website] website (the \"service\") operated by [name] (\"us\", 'we\", \"our\").</p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\"><strong>Conditions of Use</strong></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">We will provide their services to you, which are subject to the conditions stated below in this document. Every time you visit this website, use its services or make a purchase, you accept the following conditions. This is why we urge you to read them carefully.</p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\"><strong>Privacy Policy</strong></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Before you continue using our website we advise you to read our privacy policy [link to privacy policy] regarding our user data collection. It will help you better understand our practices.</p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\"><strong>Copyright</strong></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Content published on this website (digital downloads, images, texts, graphics, logos) is the property of [name] and/or its content creators and protected by international copyright laws. The entire compilation of the content found on this website is the exclusive property of [name], with copyright authorship for this compilation by [name].</p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\"><strong>Communications</strong></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">The entire communication with us is electronic. Every time you send us an email or visit our website, you are going to be communicating with us. You hereby consent to receive communications from us. If you subscribe to the news on our website, you are going to receive regular emails from us. We will continue to communicate with you by posting news and notices on our website and by sending you emails. You also agree that all notices, disclosures, agreements and other communications we provide to you electronically meet the legal requirements that such communications be in writing.</p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\"><strong>Applicable Law</strong></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">By visiting this website, you agree that the laws of the [your location], without regard to principles of conflict laws, will govern these terms of service, or any dispute of any sort that might come between [name] and you, or its business partners and associates.</p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\"><strong style=\"font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Disputes</strong><br></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Any dispute related in any way to your visit to this website or to products you purchase from us shall be arbitrated by state or federal court [your location] and you consent to exclusive jurisdiction and venue of such courts.</p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\"><span style=\"font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\"><strong>Comments, Reviews, and Emails</strong></span><br></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Visitors may post content as long as it is not obscene, illegal, defamatory, threatening, infringing of intellectual property rights, invasive of privacy or injurious in any other way to third parties. Content has to be free of software viruses, political campaign, and commercial solicitation.</p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">We reserve all rights (but not the obligation) to remove and/or edit such content. When you post your content, you grant [name] non-exclusive, royalty-free and irrevocable right to use, reproduce, publish, modify such content throughout the world in any media.</p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\"><strong>License and Site Access</strong></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">We grant you a limited license to access and make personal use of this website. You are not allowed to download or modify it. This may be done only with written consent from us.</p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\"><strong>User Account</strong></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">If you are an owner of an account on this website, you are solely responsible for maintaining the confidentiality of your private user details (username and password). You are responsible for all activities that occur under your account or password.</p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">We reserve all rights to terminate accounts, edit or remove content and cancel orders in their sole discretion.</p>",

                'setting_page_privacy_policy_enable' => Setting::PRIVACY_PAGE_ENABLED,
                'setting_page_privacy_policy' => "<p>This privacy policy (\"policy\") will help you understand how [name] (\"us\", \"we\", \"our\") uses and protects the data you provide to us when you visit and use [website] (\"website\", \"service\").</p><p>We reserve the right to change this policy at any given time, of which you will be promptly updated. If you want to make sure that you are up to date with the latest changes, we advise you to frequently visit this page.</p><p><strong>What User Data We Collect</strong></p><p>When you visit the website, we may collect the following data:</p><p><ul><li>Your IP address.</li><li>Your contact information and email address.</li><li>Other information such as interests and preferences.</li><li>Data profile regarding your online behavior on our website.</li></ul></p><p><strong>Why We Collect Your Data</strong></p><p>We are collecting your data for several reasons:</p><p><ul><li>To better understand your needs.</li><li>To improve our services and products.</li><li>To send you promotional emails containing the information we think you will find interesting.</li><li>To contact you to fill out surveys and participate in other types of market research.</li><li>To customize our website according to your online behavior and personal preferences.</li></ul></p><p><strong>Safeguarding and Securing the Data</strong></p><p>[name] is committed to securing your data and keeping it confidential. [name] has done all in its power to prevent data theft, unauthorized access, and disclosure by implementing the latest technologies and software, which help us safeguard all the information we collect online.</p><p><strong>Our Cookie Policy</strong></p><p>Once you agree to allow our website to use cookies, you also agree to use the data it collects regarding your online behavior (analyze web traffic, web pages you spend the most time on, and websites you visit).</p><p>The data we collect by using cookies is used to customize our website to your needs. After we use the data for statistical analysis, the data is completely removed from our systems.</p><p>Please note that cookies don't allow us to gain control of your computer in any way. They are strictly used to monitor which pages you find useful and which you do not so that we can provide a better experience for you.</p><p>If you want to disable cookies, you can do it by accessing the settings of your internet browser. (Provide links for cookie settings for major internet browsers).</p><p><span style=\"font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\"><strong>Links to Other Websites</strong></span></p><p>Our website contains links that lead to other websites. If you click on these links [name] is not held responsible for your data and privacy protection. Visiting those websites is not governed by this privacy policy agreement. Make sure to read the privacy policy documentation of the website you go to from our website.</p><p><strong>Restricting the Collection of your Personal Data</strong></p><p>At some point, you might wish to restrict the use and collection of your personal data. You can achieve this by doing the following:</p><p><ul><li>When you are filling the forms on the website, make sure to check if there is a box which you can leave unchecked, if you don't want to disclose your personal information.</li><li>If you have already agreed to share your information with us, feel free to contact us via email and we will be more than happy to change this for you.</li></ul></p><p>[name] will not lease, sell or distribute your personal information to any third parties, unless we have your permission. We might do so if the law forces us. Your personal information will be used when we need to send you promotional materials if you agree to this privacy policy.</p>",

                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ]
        ]);

        /**
         * Insert pre-defined plans
         */
        $plan_id = DB::table('plans')->insert([
            [
                'plan_type'     => \App\Plan::PLAN_TYPE_FREE,
                'plan_name'     => 'Free Plan',
                'plan_max_featured_listing' => 0,
                'plan_features' => 'Lifetime free listing',
                'plan_period'   => \App\Plan::PLAN_LIFETIME,
                'plan_price'    => 0,
                'plan_status'   => \App\Plan::PLAN_ENABLED,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'plan_type'     => \App\Plan::PLAN_TYPE_ADMIN,
                'plan_name'     => 'Admin Plan',
                'plan_max_featured_listing' => null,
                'plan_features' => 'admin only plan',
                'plan_period'   => \App\Plan::PLAN_LIFETIME,
                'plan_price'    => 0,
                'plan_status'   => \App\Plan::PLAN_ENABLED,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'plan_type'     => \App\Plan::PLAN_TYPE_PAID,
                'plan_name'     => 'Monthly Premium Plan',
                'plan_max_featured_listing' => 10,
                'plan_features' => 'Featured listing on homepage, categories, etc.',
                'plan_period'   => \App\Plan::PLAN_MONTHLY,
                'plan_price'    => 9.99,
                'plan_status'   => \App\Plan::PLAN_ENABLED,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'plan_type'     => \App\Plan::PLAN_TYPE_PAID,
                'plan_name'     => 'Quarterly Premium Plan',
                'plan_max_featured_listing' => 20,
                'plan_features' => 'Featured listing on homepage, categories, etc.',
                'plan_period'   => \App\Plan::PLAN_QUARTERLY,
                'plan_price'    => 26.99,
                'plan_status'   => \App\Plan::PLAN_ENABLED,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'plan_type'     => \App\Plan::PLAN_TYPE_PAID,
                'plan_name'     => 'Yearly Premium Plan',
                'plan_max_featured_listing' => 30,
                'plan_features' => 'Featured listing on homepage, categories, etc.',
                'plan_period'   => \App\Plan::PLAN_YEARLY,
                'plan_price'    => 94.99,
                'plan_status'   => \App\Plan::PLAN_ENABLED,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ]);
        $plan_id = DB::getPdo()->lastInsertId();

        /**
         * Admin user
         */
        $admin_name = $faker->firstName . ' ' . $faker->lastName;
        $admin_email = 'admin@mail.com';
        $admin_about = 'This is admin profile description, fee free to re-edit with your own description.';
        $admin_password = "12345678";

        DB::table('users')->insert([
            [
                'role_id'       => \App\Role::ADMIN_ROLE_ID,
                'name'          => $admin_name,
                'email'         => $admin_email,
                'user_about'    => $admin_about,
                'password'      => Hash::make($admin_password),
                'email_verified_at' => date("Y-m-d H:i:s"),
                'user_suspended' => \App\User::USER_NOT_SUSPENDED,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ]
        ]);

        // assign admin admin type plan and subscription
        DB::table('subscriptions')->insert([
            [
                'user_id'       => 1,
                'plan_id'       => InstallSeeder::ADMIN_PLAN_ID,
                'subscription_start_date' => date("Y-m-d"),
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ]
        ]);
        /**
         * End admin user
         */

        for($i=0;$i<InstallSeeder::TOTAL_USERS;$i++)
        {
            /**
             * create an user
             */
            $user_name = $faker->firstName . ' ' . $faker->lastName;
            $username = strtolower($faker->firstName . "." . substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 4)), 0, 4));
            $user_email = $username . "@" . $faker->freeEmailDomain;
            $user_about = 'This is admin profile description, fee free to re-edit with your own description.';
            $user_password = "12345678";

            DB::table('users')->insert([
                [
                    'role_id'       => \App\Role::USER_ROLE_ID,
                    'name'          => $user_name,
                    'email'         => $user_email,
                    'user_about'    => $user_about,
                    'password'      => Hash::make($user_password),
                    'email_verified_at' => date("Y-m-d H:i:s"),
                    'user_suspended' => \App\User::USER_NOT_SUSPENDED,
                    'created_at'    => date("Y-m-d H:i:s"),
                    'updated_at'    => date("Y-m-d H:i:s"),
                ]
            ]);

            $new_user_id = DB::getPdo()->lastInsertId();

            // assign admin admin type plan and subscription
            DB::table('subscriptions')->insert([
                [
                    'user_id'       => $new_user_id,
                    'plan_id'       => InstallSeeder::FREE_PLAN_ID,
                    'subscription_start_date' => date("Y-m-d"),
                    'subscription_max_featured_listing' => 0,
                    'created_at'    => date("Y-m-d H:i:s"),
                    'updated_at'    => date("Y-m-d H:i:s"),
                ]
            ]);
            /**
             * End create an user
             */
        }

        /**
         * Categories
         */
        $categories = [
            'Restaurants' => ['fas fa-utensils'],
            'Shopping' => ['fas fa-gifts'],
            'Nightlife' => ['fas fa-glass-martini-alt'],
            'Active Life' => ['fas fa-futbol'],
            'Beauty & Spas' => ['fas fa-paint-brush'],
            'Automotive' => ['fas fa-car'],
            'Home Services' => ['fas fa-tools'],
            'Coffee & Tea' => ['fas fa-coffee'],
            'Food' => ['fas fa-hamburger'],
            'Arts & Entertainment' => ['fas fa-palette'],
            'Health & Medical' => ['fas fa-user-md'],
            'Professional Services' => ['fas fa-briefcase'],
            'Pets' => ['fas fa-dog'],
            'Real Estate' => ['fas fa-home'],
            'Hotels & Travel' => ['fas fa-plane'],
            'Local Services' => ['fas fa-map-marked-alt'],
            'Event Planning' => ['fas fa-calendar-alt'],
            'Government Services' => ['fas fa-landmark'],
            'Financial Services' => ['fas fa-dollar-sign'],
            'Education' => ['fas fa-graduation-cap'],
            'Religious Organizations' => ['fas fa-church'],
            'Mass Media' => ['fas fa-photo-video'],
        ];

        $item_social_facebook = 'https://facebook.com';
        $item_social_twitter = 'https://twitter.com';
        $item_social_linkedin = 'https://linkedin.com';

        foreach($categories as $key => $category)
        {
            DB::table('categories')->insert([
                [
                    'category_name' => $key,
                    'category_slug' => str_slug($key),
                    'category_icon' => $category[0],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ],
            ]);
            $category_id = DB::getPdo()->lastInsertId();

            if($key == 'Restaurants')
            {
                /**
                 * custom fields for Restaurants
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'American (New),American (Traditional),Breakfast & Brunch,Burgers,Chicken Wings,Chinese,Delis,Fast Food,Italian,Japanese,Korean,Mediterranean,Mexican,Pizza,Salad,Sandwiches,Seafood,Sushi Bars,Afghan,African,Arabian,Argentine,Armenian,Asian Fusion,Australian,Austrian,Bangladeshi,Barbeque,Basque,Belgian,Brasseries,Brazilian,British,Buffets,Bulgarian,Burmese,Cafes,Cafeteria,Cajun/Creole,Cambodian,Caribbean,Catalan,Cheesesteaks,Chicken Shop,Comfort Food,Creperies,Cuban,Czech,Diners,Dinner Theater,Eritrean,Ethiopian,Filipino,Fish & Chips,Fondue,Food Court,Food Stands,French,Game Meat,Gastropubs,Georgian,German,Gluten-Free,Greek,Guamanian,Halal,Hawaiian,Himalayan/Nepalese,Honduran,Hong Kong Style Cafe,Hot Dogs,Hot Pot,Hungarian,Iberian,Indian,Indonesian,Irish,Kebab,Kosher,Laotian,Latin American,Live/Raw Food,Malaysian,Middle Eastern,Modern European,Mongolian,Moroccan,New Mexican Cuisine,Nicaraguan,Noodles,Pakistani,Pan Asian,Persian/Iranian,Peruvian,Polish,Polynesian,Pop-Up Restaurants,Portuguese,Poutineries,Russian,Scandinavian,Scottish,Singaporean,Slovakian,Somali,Soul Food,Soup,Southern,Spanish,Sri Lankan,Steakhouses,Supper Clubs,Syrian,Taiwanese,Tapas Bars,Tapas/Small Plates,Tex-Mex,Thai,Turkish,Ukrainian,Uzbek,Vegan,Vegetarian,Vietnamese,Waffles,Wraps',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Delivery,Takeout,Cash Back,Takes Reservations,Accepts Credit Cards,Outdoor Seating,Good for Kids,Good for Groups,Waiter Service,Wheelchair Accessible,Has TV,Dogs Allowed,Hot and New,Offers Military Discount,Gender Neutral Restrooms,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Alcohol',
                        'custom_field_seed_value' => 'Full Bar,Good For Happy Hour,Beer & Wine Only',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Meals Served',
                        'custom_field_seed_value' => 'Breakfast,Brunch,Lunch,Dinner,Dessert,Late Night',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Parking',
                        'custom_field_seed_value' => 'Street,Garage,Private Lot,Validated,Valet',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Start Order',
                        'custom_field_order' => 8,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Reserve a Table',
                        'custom_field_order' => 9,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 10,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Restaurants
                 */

                /**
                 * Start items for Restaurants
                 */
                $restaurant_names = [
                    'Parallel 37',
//                    'Starbelly',
//                    'Brass Tacks',
//                    'Lord Stanley',
//                    'Top of the Mark',
//                    'Pier 23',
//                    'Plumed Horse',
//                    'Everest',
//                    'The Aviary',
//                    'Rebar',
//                    'Proxi',
//                    'The Rosebud',
//                    'The Signature Room',
//                    'Goosefoot',
//                    'Catch 35',
//                    'Gemini',
//                    'Blackbrick',
//                    'Cafe Coyote',
//                    'Chewy Balls',
//                    'Crab Hut',
//                    'Double Knot',
//                    'Famous Lunch',
                ];

                foreach($restaurant_names as $key_1 => $restaurant_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $restaurant_name;
                    $item_slug = get_item_slug();
                    $item_description = $restaurant_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Restaurants
                 */

            }

            if($key == 'Shopping')
            {
                /**
                 * Start custom fields for Shopping
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Antiques,Art Galleries,Arts & Crafts,Books, Mags, Music & Video,Bridal,Customized Merchandise,Drugstores,Fashion,Flowers & Gifts,Home & Garden,Jewelry,Packing Supplies,Personal Shopping,Spiritual Shop,Sporting Goods,Toy Stores,Watches,Wholesale Stores,Adult,Auction Houses,Baby Gear & Furniture,Battery Stores,Bespoke Clothing,Brewing Supplies,Cannabis Dispensaries,Computers,Cosmetics & Beauty Supply,Department Stores,Diamond Buyers,Discount Store,Drones,Duty-Free Shops,Electronics,Eyewear & Opticians,Farming Equipment,Fireworks,Fitness/Exercise Equipment,Flea Markets,Gemstones & Minerals,Gold Buyers,Guns & Ammo,Head Shops,High Fidelity Audio Equipment,Hobby Shops,Horse Equipment Shops,Knitting Supplies,Livestock Feed & Supply,Luggage,Medical Supplies,Military Surplus,Mobile Phone Accessories,Mobile Phones,Motorcycle Gear,Musical Instruments & Teachers,Office Equipment,Outlet Stores,Pawn Shops,Perfume,Photography Stores & Services,Pool & Billiards,Pop-up Shops,Props,Public Markets,Religious Items,Safe Stores,Safety Equipment,Shopping Centers,Souvenir Shops,Tabletop Games,Teacher Supplies,Thrift Stores,Tobacco Shops,Trophy Shops,Uniforms,Used Bookstore,Vape Shops,Vitamins & Supplements,Wigs',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Offering a Deal,Accepts Credit Cards,Good for Kids,Wheelchair Accessible,By Appointment Only,Dogs Allowed,Sells Gift Certificates,Hot and New,Offers Military Discount,Gender Neutral Restrooms,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Parking',
                        'custom_field_seed_value' => 'Street,Garage,Private Lot,Validated,Valet',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Online Shop',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Shopping
                 */

                /**
                 * Start items for Shopping
                 */
                $shopping_names = [
                    'Dress Shop',
//                    'Shopping Lux Online',
//                    'Sunlight Store',
//                    'The Sale Connect',
//                    'E-Xcel Stores',
//                    'Swift Comfort Stores',
//                    'Speed Transact',
//                    'Store Behind Your Screen',
//                    'Market Unlimited',
//                    'The Values Store',
//                    'Net To Door Stores',
//                    'New Wave Shop Online',
                ];

                foreach($shopping_names as $key_1 => $shopping_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $shopping_name;
                    $item_slug = get_item_slug();
                    $item_description = $shopping_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';

                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Shopping
                 */


            }

            if($key == 'Nightlife')
            {
                /**
                 * Start custom fields for Nightlife
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Adult Entertainment,Bar Crawl,Bars,Beer Gardens,Club Crawl,Comedy Clubs,Country Dance Halls,Dance Clubs,Jazz & Blues,Karaoke,Music Venues,Piano Bars,Pool Halls',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Delivery,Takeout,Takes Reservations,Accepts Credit Cards,Outdoor Seating,Good for Kids,Good for Groups,Waiter Service,Wheelchair Accessible,Has TV,Dogs Allowed,Hot and New,Offers Military Discount,Gender Neutral Restrooms,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Alcohol',
                        'custom_field_seed_value' => 'Full Bar,Good For Happy Hour,Beer & Wine Only',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Meals Served',
                        'custom_field_seed_value' => 'Breakfast,Brunch,Lunch,Dinner,Dessert,Late Night',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Music',
                        'custom_field_seed_value' => 'DJ,Juke Box,Karaoke,Live',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Parking',
                        'custom_field_seed_value' => 'Street,Garage,Private Lot,Validated,Valet',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 8,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Smoking',
                        'custom_field_seed_value' => 'No,Yes,Outdoor Area / Patio Only',
                        'custom_field_order' => 9,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Start Order',
                        'custom_field_order' => 10,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Reserve a Table',
                        'custom_field_order' => 11,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 12,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Nightlife
                 */

                /**
                 * Start items for Nightlife
                 */
                $nightlife_names = [
                    'XS Nightclub',
//                    'Marquee Nightclub',
//                    'Surrender Nightclub',
//                    'Hyde Bellagio',
//                    'Seacrets',
//                    'The Pool After Dark',
//                    'Chandelier Bar',
//                    'The Abbey Food & Bar',
//                    'Temple Nightclub',
//                    'Landmark Bar & Kitchen',
//                    'Heat Ultra Lounge',
//                    "Hurricane O' Reilly's",
//                    'The Brahmin',
//                    'Greystone Manor',
//                    'Cake Nightclub',
                ];

                foreach($nightlife_names as $key_1 => $nightlife_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $nightlife_name;
                    $item_slug = get_item_slug();
                    $item_description = $nightlife_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Nightlife
                 */

            }

            if($key == 'Active Life')
            {
                /**
                 * Start custom fields for Active Life
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Amateur Sports Teams,Bike Rentals,Boating,Day Camps,Fishing,Fitness & Instruction,Golf,Hiking,Kids Activities,Paddleboarding,Parks,Rafting/Kayaking,Soccer,Sports Clubs,Summer Camps,Surfing,Swimming Pools,Tennis,Airsoft,Amusement Parks,Aquariums,Archery,ATV Rentals/Tours,Axe Throwing,Badminton,Baseball Fields,Basketball Courts,Batting Cages,Beach Equipment Rentals,Beaches,Bike Parking,Bobsledding,Bocce Ball,Bowling,Bubble Soccer,Bungee Jumping,Canyoneering,Carousels,Challenge Courses,Climbing,Cycling Classes,Dart Arenas,Disc Golf,Diving,Escape Games,Fencing Clubs,Flyboarding,Go Karts,Gun/Rifle Ranges,Gymnastics,Hang Gliding,Horse Racing,Horseback Riding,Hot Air Balloons,Indoor Playcentre,Jet Skis,Kiteboarding,Lakes,Laser Tag,Mini Golf,Mountain Biking,Nudist,Paintball,Paragliding,Parasailing,Pickleball,Playgrounds,Races & Competitions,Racing Experience,Recreation Centers,Rock Climbing,Sailing,Scavenger Hunts,Scooter Rentals,Senior Centers,Skating Rinks,Skydiving,Sledding,Snorkeling,Squash,Trampoline Parks,Tubing,Water Parks,Wildlife Hunting Ranges,Ziplining,Zoos,Zorbing',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Offering a Deal,Accepts Credit Cards,Good for Kids,Wheelchair Accessible,By Appointment Only,Dogs Allowed,Sells Gift Certificates,Offers Military Discount,Gender Neutral Restrooms,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Parking',
                        'custom_field_seed_value' => 'Street,Garage,Private Lot,Validated,Valet',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Book Online',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Active Life
                 */

                /**
                 * Start items for Active Life
                 */
                $active_life_names = [
                    'Montrose Martial Arts Center',
//                    'Global Premier Soccer',
//                    'Grace Bhan Pilates',
//                    'Doha Taekwondo',
//                    '168 FITNESS',
//                    'Crescenta Valley Park',
//                    'Deukmejian Wilderness Park',
//                    'Spiral Path Yoga Center',
//                    'Sparkling Touch',
//                    'Memorial Park',
//                    'CrossFit Crescenta Valley',
//                    'Mayors’ Discovery Park',
                ];

                foreach($active_life_names as $key_1 => $active_life_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $active_life_name;
                    $item_slug = get_item_slug();
                    $item_description = $active_life_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Active Life
                 */
            }

            if($key == 'Beauty & Spas')
            {
                /**
                 * Start custom fields for Beauty & Spas
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Barbers,Cosmetics & Beauty Supply,Day Spas,Eyebrow Services,Eyelash Service,Hair Extensions,Hair Loss Centers,Hair Removal,Hair Salons,Makeup Artists,Massage,Medical Spas,Nail Salons,Permanent Makeup,Skin Care,Tanning,Tattoo,Teeth Whitening,Acne Treatment,Hot Springs,Perfume,Piercing',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Offering a Deal,Accepts Credit Cards,Good for Kids,Wheelchair Accessible,By Appointment Only,Sells Gift Certificates,Offers Military Discount,Gender Neutral Restrooms,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Parking',
                        'custom_field_seed_value' => 'Street,Garage,Private Lot,Validated,Valet',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Request an Appointment',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Beauty & Spas
                 */

                /**
                 * Start items for Beauty & Spas
                 */
                $beauty_spas_names = [
                    'The Makeover Place',
//                    'Inspirations Salon',
//                    'Serenity Salon',
//                    'Beauty Mark',
//                    'Dying for Color',
//                    'Masterpieces Hair Salon',
//                    'A Little off the Top',
//                    'A Peaceful Escape Spa',
//                    'Pamper Me Spa',
//                    'Tranquil Garden Massages',
//                    'Stillwater Spa & Resort',
//                    'Heavenly Spa Services',
//                    'Complexions Beauty and Spa',
//                    'Body and Mind Spa',
//                    "May's Massages",
                ];

                foreach($beauty_spas_names as $key_1 => $beauty_spas_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $beauty_spas_name;
                    $item_slug = get_item_slug();
                    $item_description = $beauty_spas_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Beauty & Spas
                 */

            }

            if($key == 'Automotive')
            {
                /**
                 * Start custom fields for Automotive
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Auto Customization,Auto Detailing,Auto Glass Services,Auto Parts & Supplies,Auto Repair,Body Shops,Car Brokers,Car Buyers,Car Dealers,Car Stereo Installation,Car Wash,Mobile Dent Repair,Oil Change Stations,Roadside Assistance,Tires,Towing,Vehicle Shipping,Vehicle Wraps,Aircraft Dealers,Aircraft Repairs,Auto Loan Providers,Auto Security,Auto Upholstery,Aviation Services,Boat Dealers,Boat Parts & Supplies,Car Auctions,Car Inspectors,Car Share Services,Commercial Truck Dealers,Commercial Truck Repair,EV Charging Stations,Fuel Docks,Gas Stations,Golf Cart Dealers,Hybrid Car Repair,Interlock Systems,Marinas,Mobility Equipment Sales & Services,Motorcycle Dealers,Motorcycle Repair,Motorsport Vehicle Dealers,Motorsport Vehicle Repairs,Parking,Registration Services,RV Dealers,RV Repair,Service Stations,Smog Check Stations,Trailer Dealers,Trailer Rental,Trailer Repair,Transmission Repair,Truck Rental,Used Car Dealers,Wheel & Rim Repair,Windshield Installation & Repair',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Offering a Deal,Accepts Credit Cards,Sells Gift Certificates,Offers Military Discount,Gender Neutral Restrooms,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Request a Quote',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Automotive
                 */

                /**
                 * Start items for Automotive
                 */
                $automotive_names = [
                    "Campbell’s Automotive Repair Service",
//                    "Tire 4 Less",
//                    "Jg’s Automotive",
//                    "Kim’s Auto Tech",
//                    "O’Reilly Auto Parts",
//                    "Bruce’s Automotive",
//                    "Bob Smith Toyota",
//                    "Hi Star Auto Sales",
//                    "Ideal Auto Group",
//                    "JD Motors",
//                    "CarGeeks",
//                    "Black Diamond Auto Group",
//                    "OpenTrade",
//                    "BIDLANE - Car Buying Center - Burbank",
//                    "Socal Auto Buy",
//                    "EZ Auto Group",
                ];

                foreach($automotive_names as $key_1 => $automotive_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $automotive_name;
                    $item_slug = get_item_slug();
                    $item_description = $automotive_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Automotive
                 */

            }

            if($key == 'Home Services')
            {
                /**
                 * Start custom fields for Home Services
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Contractors,Damage Restoration,Electricians,Fences & Gates,Flooring,Heating & Air Conditioning/HVAC,Home Cleaning,Interior Design,Landscaping,Masonry/Concrete,Movers,Painters,Plumbing,Real Estate,Roofing,Security Systems,Solar Installation,Water Heater Installation/Repair,Artificial Turf,Building Supplies,Cabinetry,Carpenters,Carpet Installation,Carpeting,Childproofing,Chimney Sweeps,Countertop Installation,Decks & Railing,Demolition Services,Door Sales/Installation,Drywall Installation & Repair,Excavation Services,Fire Protection Services,Fireplace Services,Firewood,Foundation Repair,Furniture Assembly,Garage Door Services,Gardeners,Glass & Mirrors,Grout Services,Gutter Services,Handyman,Holiday Decorating Services,Home Automation,Home Energy Auditors,Home Inspectors,Home Network Installation,Home Organization,Home Theatre Installation,Home Window Tinting,House Sitters,Insulation Installation,Internet Service Providers,Irrigation,Keys & Locksmiths,Landscape Architects,Lighting Fixtures & Equipment,Mobile Home Repair,Packing Services,Patio Coverings,Pool & Hot Tub Service,Pool Cleaners,Pressure Washers,Refinishing Services,Roof Inspectors,Sauna Installation & Repair,Shades & Blinds,Shutters,Siding,Solar Panel Cleaning,Structural Engineers,Stucco Services,Television Service Providers,Tiling,Tree Services,Utilities,Wallpapering,Water Purification Services,Waterproofing,Window Washing,Windows Installation',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Online Booking,Offering a Deal,Accepts Credit Cards,Accepts Cryptocurrency,Offers Delivery,Wheelchair Accessible,By Appointment Only,Dogs Allowed,Request a Quote,Sells Gift Certificates,Hot and New,Offers Military Discount,Gender Neutral Restrooms,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Parking',
                        'custom_field_seed_value' => 'Street,Garage,Private Lot,Validated,Valet',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Request a Quote',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Home Services
                 */

                /**
                 * Start items for Home Services
                 */
                $home_services_names = [
                    "Craig’s Electric",
//                    "Crescenta Valley Flooring",
//                    "Garage Door Basics",
//                    "Good Day Handyman",
//                    "Bob Fox & Sons Remodeling",
//                    "Papa’s Plumbing",
//                    "R Power Services",
//                    "Big Al’s Appliance Repair",
//                    "The Electric Connection",
//                    "Nexen Group",
//                    "A&G Remodeling and Repairs",
//                    "Foothill Plumbing",
//                    "J’s Maid Service",
//                    "Greco Windows and Doors",
//                    "Thank You Construction",
//                    "Chimney Sweep Bill",
//                    "Design Pro & Starlite Construction",
//                    "House Painting Inc",
//                    "Ed & Ed Brothers",
//                    "The Flooring Masters",
//                    "La Canada Contractors Pros",
                ];

                foreach($home_services_names as $key_1 => $home_services_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $home_services_name;
                    $item_slug = get_item_slug();
                    $item_description = $home_services_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Home Services
                 */

            }

            if($key == 'Coffee & Tea')
            {
                /**
                 * Start custom fields for Coffee & Tea
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => '7 Leaves Cafe,Cafe,Cafés & Coffee Shops,Coffee Bean,Coffee Shop,Coffee Shops Free Wifi,Peet\'s Coffee,Philz Coffee,Places to Study,Starbucks,Starbucks Drive Thru,Study,Study Cafe,Study Spots,The Coffee Bean & Tea Leaf',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Delivery,Takeout,Accepts Credit Cards,Outdoor Seating,Good for Kids,Good for Groups,Wheelchair Accessible,Dogs Allowed,Offers Military Discount,Gender Neutral Restrooms,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Meals Served',
                        'custom_field_seed_value' => 'Breakfast,Brunch,Lunch,Dinner,Dessert,Late Night',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Parking',
                        'custom_field_seed_value' => 'Street,Garage,Private Lot,Validated,Valet',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Start Order',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 8,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Coffee & Tea
                 */

                /**
                 * Start items for Coffee & Tea
                 */
                $coffee_tea_names = [
                    "Reborn Coffee - La Crescenta",
//                    "Cakery Bakery",
//                    "Gio’s Bakery & Café",
//                    "Starbucks",
//                    "Nanuri Snack",
//                    "Arnie’s Coffee & Cruise",
//                    "The Coffee Bean & Tea Leaf",
//                    "Brothaus Café",
//                    "5.2 Patio",
//                    "Forge",
//                    "Café Royale",
                ];

                foreach($coffee_tea_names as $key_1 => $coffee_tea_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $coffee_tea_name;
                    $item_slug = get_item_slug();
                    $item_description = $coffee_tea_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Coffee & Tea
                 */

            }

            if($key == 'Food')
            {
                /**
                 * Start custom fields for Food
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Bakeries,Beer, Wine & Spirits,Bubble Tea,Coffee & Tea,Convenience Stores,Cupcakes,Custom Cakes,Desserts,Donuts,Farmers Market,Food Delivery Services,Food Trucks,Grocery,Ice Cream & Frozen Yogurt,Juice Bars & Smoothies,Specialty Food,Street Vendors,Tea Rooms,Acai Bowls,Bagels,Beverage Store,Breweries,Butcher,Chimney Cakes,Cideries,Coffee Roasteries,CSA,Distilleries,Do-It-Yourself Food,Empanadas,Gelato,Honey,Imported Food,International Grocery,Internet Cafes,Kombucha,Meaderies,Organic Stores,Patisserie/Cake Shop,Piadina,Poke,Pretzels,Shaved Ice,Shaved Snow,Smokehouse,Water Stores,Wineries',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Accepts Credit Cards,Offers Delivery,Outdoor Seating,Good for Kids,Good for Groups,Offers Takeout,Wheelchair Accessible,Has TV,Dogs Allowed,Offers Military Discount,Gender Neutral Restrooms,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Meals Served',
                        'custom_field_seed_value' => 'Breakfast,Brunch,Lunch,Dinner,Dessert,Late Night',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Parking',
                        'custom_field_seed_value' => 'Street,Garage,Private Lot,Validated,Valet',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Start Order',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 8,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Food
                 */

                /**
                 * Start items for Food
                 */
                $food_names = [
                    "ZEN Foods",
//                    "Schreiner’s Fine Sausages",
//                    "Harmony Farms",
//                    "Berolina Bakery & Pastry Shop",
//                    "Seoul Market",
//                    "Alexis Deli & Grocery",
//                    "Foster’s Family Donuts",
//                    "John Sparr Tavern",
//                    "Village Liquor & Wine",
//                    "Harmony Farms",
//                    "Dream Dinners",
//                    "The T Room",
//                    "Novin Herbs & Spices",
                ];

                foreach($food_names as $key_1 => $food_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $food_name;
                    $item_slug = get_item_slug();
                    $item_description = $food_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Food
                 */
            }

            if($key == 'Arts & Entertainment')
            {
                /**
                 * Start custom fields for Arts & Entertainment
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Arcades,Art Galleries,Bingo Halls,Botanical Gardens,Cinema,Farms,Festivals,Jazz & Blues,Museums,Music Venues,Paint & Sip,Performing Arts,Social Clubs,Stadiums & Arenas,Supernatural Readings,Ticket Sales,Virtual Reality Centers,Wineries,Cabaret,Casinos,Country Clubs,Cultural Center,Eatertainment,Haunted Houses,LAN Centers,Makerspaces,Observatories,Opera & Ballet,Planetarium,Professional Sports Teams,Race Tracks,Rodeo,Sports Betting,Studio Taping',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Offering a Deal,Accepts Credit Cards,Good for Kids,Wheelchair Accessible,By Appointment Only,Dogs Allowed,Sells Gift Certificates,Offers Military Discount,Gender Neutral Restrooms,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Parking',
                        'custom_field_seed_value' => 'Street,Garage,Private Lot,Validated,Valet',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Request Information',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Arts & Entertainment
                 */

                /**
                 * Start items for Arts & Entertainment
                 */
                $arts_entertainment_names = [
                    "Dunsmore Alano Club",
//                    "Modest Fly Art Studio Gallery",
//                    "Creative Lounge",
//                    "Yom’s Dance Studio",
//                    "Yung-mee Rhee Music Academy",
//                    "Djanbazian Dance Academy",
//                    "Alexandra Manukyan Art Studio",
//                    "Bolton Hall Museum",
                ];

                foreach($arts_entertainment_names as $key_1 => $arts_entertainment_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $arts_entertainment_name;
                    $item_slug = get_item_slug();
                    $item_description = $arts_entertainment_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Arts & Entertainment
                 */
            }

            if($key == 'Health & Medical')
            {
                /**
                 * Start custom fields for Health & Medical
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Acupuncture,Cannabis Clinics,Chiropractors,Counseling & Mental Health,Dentists,Doctors,Doulas,Home Health Care,Hospice,Hypnosis/Hypnotherapy,Lactation Services,Massage Therapy,Medical Transportation,Nutritionists,Personal Care Services,Physical Therapy,Reiki,Skilled Nursing,Alternative Medicine,Animal Assisted Therapy,Assisted Living Facilities,Ayurveda,Behavior Analysts,Blood & Plasma Donation Centers,Body Contouring,Cannabis Collective,Colonics,Concierge Medicine,Crisis Pregnancy Centers,Cryotherapy,Dental Hygienists,Diagnostic Services,Dialysis Clinics,Dietitians,Emergency Rooms,Float Spa,Habilitative Services,Halfway Houses,Halotherapy,Health Coach,Health Insurance Offices,Hearing Aid Providers,Herbal Shops,Hospitals,Hydrotherapy,IV Hydration,Laser Eye Surgery/Lasik,Lice Services,Medical Cannabis Referrals,Medical Centers,Medical Spas,Memory Care,Midwives,Nurse Practitioner,Occupational Therapy,Optometrists,Organ & Tissue Donor Services,Orthotics,Oxygen Bars,Pharmacy,Placenta Encapsulations,Prenatal/Perinatal Care,Prosthetics,Prosthodontists,Reflexology,Rehabilitation Center,Reproductive Health Services,Retirement Homes,Saunas,Sleep Specialists,Speech Therapists,Sperm Clinic,Traditional Chinese Medicine,Ultrasound Imaging Centers,Urgent Care,Weight Loss Centers',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Offering a Deal,Accepts Credit Cards,Good for Kids,Wheelchair Accessible,By Appointment Only,Dogs Allowed,Sells Gift Certificates,Offers Military Discount,Gender Neutral Restrooms,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Parking',
                        'custom_field_seed_value' => 'Street,Garage,Private Lot,Validated,Valet',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Request an Appointment',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Health & Medical
                 */

                /**
                 * Start items for Health & Medical
                 */
                $health_medical_names = [
                    "Gardens of El Monte",
//                    "Faith Acupuncture",
//                    "Cha’s Herbs & Acupuncture",
//                    "Royale Home Health Care",
//                    "Franklin Medical",
//                    "La Crescenta Chiropractic",
//                    "Vibrational Harmony Holistic Health",
//                    "James M Kanda, DDS",
//                    "2 See Optometry",
//                    "Advanced Health Solutions",
//                    "Crescent Dental",
//                    "Irish Jean Lim-Cagatao, DDS",
//                    "Rashel Keshmiri, Ms, Lmft",
//                    "Two Hearts Nutrition",
//                    "Pacific Diagnostic Medical",
//                    "Laura Evans, MD",
                ];

                foreach($health_medical_names as $key_1 => $health_medical_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $health_medical_name;
                    $item_slug = get_item_slug();
                    $item_description = $health_medical_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Health & Medical
                 */

            }

            if($key == 'Professional Services')
            {
                /**
                 * Start custom fields for Professional Services
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Accountants,Advertising,Architects,Business Consulting,Graphic Design,Internet Service Providers,Lawyers,Legal Services,Life Coach,Marketing,Office Cleaning,Private Investigation,Security Services,Signmaking,Software Development,Translation Services,Video/Film Production,Web Design,Art Consultants,Billing Services,Boat Repair,Bookkeepers,Career Counseling,Commissioned Artists,Customs Brokers,Digitizing Services,Duplication Services,Editorial Services,Employment Agencies,Feng Shui,Indoor Landscaping,Matchmakers,Mediators,Music Production Services,Patent Law,Payroll Services,Personal Assistants,Product Design,Public Adjusters,Public Relations,Shredding Services,Talent Agencies,Taxidermy,Tenant and Eviction Law,Wholesalers',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Offering a Deal,Accepts Credit Cards,Accepts Cryptocurrency,Good for Kids,Wheelchair Accessible,By Appointment Only,Dogs Allowed,Request a Quote,Sells Gift Certificates,Offers Military Discount,Gender Neutral Restrooms,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Parking',
                        'custom_field_seed_value' => 'Street,Garage,Private Lot,Validated,Valet',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Request a Consultation',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Professional Services
                 */

                /**
                 * Start items for Professional Services
                 */
                $professional_services_names = [
                    "Mark G McNelis & Associates CPA’s",
//                    "Rosen & Associates",
//                    "Charles B Andrew, CPA",
//                    "Paragon Business Solutions",
//                    "Kelly & Small Certified Public Accountants",
//                    "Manibog Law",
//                    "Metis Law Group",
//                    "Eick & Freeborn, LLP",
//                    "Paijuk Law",
//                    "Abkarian & Associates",
//                    "Law Offices of Armen Zadourian",
//                    "Law Offices of Robert F Brennan",
//                    "Onyx Law Firm",
//                    "Robert K Smith",
//                    "Duane C Stroh, Attorney At Law",
//                    "Babachanian - Legal Counsel",
                ];

                foreach($professional_services_names as $key_1 => $professional_services_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $professional_services_name;
                    $item_slug = get_item_slug();
                    $item_description = $professional_services_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Professional Services
                 */

            }

            if($key == 'Pets')
            {
                /**
                 * Start custom fields for Pets
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Animal Shelters,Horse Boarding,Pet Adoption,Pet Services,
                        Pet Stores,Veterinarians',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Offering a Deal,Accepts Credit Cards,Accepts Cryptocurrency,By Appointment Only,Sells Gift Certificates,Offers Military Discount,Gender Neutral Restrooms,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Parking',
                        'custom_field_seed_value' => 'Street,Garage,Private Lot,Validated,Valet',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Request an Appointment',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Pets
                 */

                /**
                 * Start items for Pets
                 */
                $pets_names = [
                    "PetSmart",
//                    "Andersen’s Pet Shop",
//                    "Doggie Styles",
//                    "Crescenta Canada Pet Hospital",
//                    "Tribe to Table",
//                    "Petstar Grooming",
//                    "Montrose Pet Hospital",
//                    "Pampered Poochez",
//                    "Je t’adore Pet Salon",
//                    "Button Nose Pet Shop",
//                    "Pups in Tubs",
//                    "La Canada Pet Clinic",
                ];

                foreach($pets_names as $key_1 => $pets_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $pets_name;
                    $item_slug = get_item_slug();
                    $item_description = $pets_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Pets
                 */

            }

            if($key == 'Real Estate')
            {
                /**
                 * Start custom fields for Real Estate
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Apartments,Art Space Rentals,Commercial Real Estate,Condominiums,Estate Liquidation,Home Developers,Home Staging,Homeowner Association,Mobile Home Dealers,Mobile Home Parks,Mortgage Brokers,Property Management,Real Estate Agents,Real Estate Services,Shared Office Spaces,Housing Cooperatives,Kitchen Incubators,University Housing',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Offering a Deal,Accepts Credit Cards,Accepts Cryptocurrency,Wheelchair Accessible,By Appointment Only,Request a Quote,Sells Gift Certificates,Offers Military Discount,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Parking',
                        'custom_field_seed_value' => 'Street,Garage,Private Lot,Validated,Valet',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Request a Consultation',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Real Estate
                 */

                /**
                 * Start items for Real Estate
                 */
                $real_estate_names = [
                    "Thomas Atamian + Associates",
//                    "The Shelhamer Real Estate Group",
//                    "Omar Bardumyan - Real Estate Agent",
//                    "Team Rock Properties",
//                    "The Brad Korb Real Estate Group",
//                    "Richard Buckisch Realtor",
//                    "Arbitrage Real Estate Group",
//                    "Kobeissi Properties",
//                    "Jonathan Yuen - Compass Real Estate",
//                    "Trevino Properties",
//                    "Baboudjian Properties",
//                    "Keyes Real Estate",
//                    "Elevated Living Realty",
                ];

                foreach($real_estate_names as $key_1 => $real_estate_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $real_estate_name;
                    $item_slug = get_item_slug();
                    $item_description = $real_estate_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Real Estate
                 */

            }

            if($key == 'Hotels & Travel')
            {
                /**
                 * Start custom fields for Hotels & Travel
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Campgrounds,Car Rental,Health Retreats,Hotels,Motorcycle Rental,RV Rental,Ski Resorts,Tours,Transportation,Travel Services,Vacation Rental Agents,Vacation Rentals,Airports,Bed & Breakfast,Guest Houses,Hostels,Resorts,RV Parks,Train Stations',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Offering a Deal,Accepts Credit Cards,Good for Kids,Sells Gift Certificates,Offers Military Discount,Gender Neutral Restrooms,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Parking',
                        'custom_field_seed_value' => 'Street,Garage,Private Lot,Validated,Valet',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Book Online',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Hotels & Travel
                 */

                /**
                 * Start items for Hotels & Travel
                 */
                $hotel_travel_names = [
                    "La Crescenta Motel",
//                    "Archer Travel",
//                    "Montrose Travel",
//                    "Tedjo Express Tours",
//                    "Significant Living Travel",
//                    "Blue Onyx Travel",
//                    "Mount Waterman Ski Lifts",
//                    "Village Travel Service",
//                    "GP Moto Rentals",
//                    "Van Voyage",
//                    "Continental Rental",
//                    "Bird Infinity Group",
//                    "SVH Tours & Travel Services",
                ];

                foreach($hotel_travel_names as $key_1 => $hotel_travel_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $hotel_travel_name;
                    $item_slug = get_item_slug();
                    $item_description = $hotel_travel_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Hotels & Travel
                 */

            }

            if($key == 'Local Services')
            {
                /**
                 * Start custom fields for Local Services
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Air Duct Cleaning,Appliances & Repair,Bail Bondsmen,Carpet Cleaning,Couriers & Delivery Services,Electronics Repair,Environmental Testing,Hydro-jetting,IT Services & Computer Repair,Junk Removal & Hauling,Metal Fabricators,Musical Instrument Services,Notaries,Pest Control,Printing Services,Screen Printing/T-Shirt Printing,Self Storage,TV Mounting,3D Printing,Adoption Services,Appraisal Services,Art Installation,Art Restoration,Awnings,Bike Repair/Maintenance,Biohazard Cleanup,Bookbinding,Bus Rental,Calligraphy,Carpet Dyeing,Child Care & Day Care,Clock Repair,Community Book Box,Community Gardens,Community Service/Non-Profit,Crane Services,Donation Center,Elder Care Planning,Elevator Services,Engraving,Environmental Abatement,Farm Equipment Repair,Fingerprinting,Funeral Services & Cemeteries,Furniture Rental,Furniture Repair,Furniture Reupholstery,Generator Installation/Repair,Grill Services,Gunsmith,Hazardous Waste Disposal,Ice Delivery,Jewelry Repair,Junkyards,Knife Sharpening,Laundry Services,Machine & Tool Rental,Machine Shops,Mailbox Centers,Metal Detector Services,Misting System Services,Nanny Services,Outdoor Power Equipment Services,Portable Toilet Services,Powder Coating,Propane,Recording & Rehearsal Studios,Recycling Center,Sandblasting,Screen Printing,Septic Services,Sewing & Alterations,Shipping Centers,Shoe Repair,Shoe Shine,Snow Removal,Snuggle Services,Stonemasons,Watch Repair,Water Delivery,Well Drilling,Wildlife Control',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Offering a Deal,Accepts Credit Cards,Accepts Cryptocurrency,Offers Delivery,Good for Kids,Wheelchair Accessible,By Appointment Only,Dogs Allowed,Sells Gift Certificates,Hot and New,Offers Military Discount,Gender Neutral Restrooms,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Parking',
                        'custom_field_seed_value' => 'Street,Garage,Private Lot,Validated,Valet',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Request a Quote',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Local Services
                 */

                /**
                 * Start items for Local Services
                 */
                $local_services_names = [
                    "Hydrex Pest Control & Termite",
//                    "A Junk Free Planet",
//                    "Sam’s Computer Service",
//                    "Foothill Junk Removal",
//                    "Emins Air Conditioning and Heating",
//                    "Sarian Recycling",
//                    "US Storage Centers",
//                    "Dr Dryer Duct",
//                    "Greg’s Dry Cleaning & Alterations",
                ];

                foreach($local_services_names as $key_1 => $local_services_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $local_services_name;
                    $item_slug = get_item_slug();
                    $item_description = $local_services_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Local Services
                 */

            }

            if($key == 'Event Planning')
            {
                /**
                 * Start custom fields for Event Planning
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Bartenders,Caterers,DJs,Face Painting,Floral Designers,Henna Artists,Magicians,Musicians,Officiants,Party & Event Planning,Party Bus Rentals,Party Characters,Party Equipment Rentals,Personal Chefs,Photo Booth Rentals,Photographers,Videographers,Wedding Planning,Balloon Services,Boat Charters,Cards & Stationery,Caricatures,Clowns,Game Truck Rental,Golf Cart Rentals,Hotels,Mohels,Party Bike Rentals,Party Supplies,Silent Disco,Sommelier Services,Team Building Activities,Trivia Hosts,Valet Services,Venues & Event Spaces,Wedding Chapels',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Offering a Deal,Accepts Credit Cards,Accepts Cryptocurrency,Offers Delivery,Good for Kids,Good for Groups,Offers Takeout,Wheelchair Accessible,By Appointment Only,Dogs Allowed,Sells Gift Certificates,Hot and New,Offers Military Discount,Gender Neutral Restrooms,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Parking',
                        'custom_field_seed_value' => 'Street,Garage,Private Lot,Validated,Valet',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Request Information',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Event Planning
                 */

                /**
                 * Start items for Event Planning
                 */
                $event_planning_names = [
                    "Bonners Party Rentals",
//                    "Local Events Rental",
//                    "Crescenta Valley Flowers",
//                    "Shine Entertainment",
//                    "Now & Forever Event Planning",
//                    "Amy Greenberg Events",
//                    "Brag Designs",
//                    "Ken Yoo Studio",
//                    "Mod About Events",
//                    "BabyDoll Events",
//                    "Talin Film Photography & Video",
//                    "This Magic Moment Events",
//                    "Falon B Weddings",
                ];

                foreach($event_planning_names as $key_1 => $event_planning_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $event_planning_name;
                    $item_slug = get_item_slug();
                    $item_description = $event_planning_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Event Planning
                 */

            }

            if($key == 'Government Services')
            {
                /**
                 * Start custom fields for Government Services
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Civic Center,Community Centers,Courthouses,Departments of Motor Vehicles,Embassy,Fire Departments,Jails & Prisons,Landmarks & Historical Buildings,Libraries,Municipality,Police Departments,Post Offices,Town Hall',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Accepts Credit Cards,Offers Military Discount,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Government Services
                 */

                /**
                 * Start items for Government Services
                 */
                $government_services_names = [
                    "Montrose-Crescenta Branch Library",
//                    "Copps Police Substation",
//                    "Boddy House",
//                    "US Post Office",
//                    "Crescenta Valley Sheriff Station",
                ];

                foreach($government_services_names as $key_1 => $government_services_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $government_services_name;
                    $item_slug = get_item_slug();
                    $item_description = $government_services_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Government Services
                 */

            }

            if($key == 'Financial Services')
            {
                /**
                 * Start custom fields for Financial Services
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Banks & Credit Unions,Business Financing,Check Cashing/Pay-day Loans,Currency Exchange,Debt Relief Services,Financial Advising,Installment Loans,Insurance,Investing,Mortgage Lenders,Tax Services,Title Loans',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Offering a Deal,Accepts Credit Cards,Offers Military Discount,
                        Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Request a Consultation',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Financial Services
                 */

                /**
                 * Start items for Financial Services
                 */
                $financial_services_names = [
                    "American Savings Financial Services",
//                    "Crescenta Valley Insurance",
//                    "Bank of America",
//                    "Wells Fargo Bank",
//                    "Laser Pay Check",
//                    "US Tax Guru",
//                    "Citibank",
//                    "U.S. Bank Branch",
//                    "Centric Financial Services",
//                    "Badalian’s Financial Services",
//                    "Ichor Financial",
//                    "Tabsco",
//                    "Chase Bank",
//                    "Gardena Financial",
                ];

                foreach($financial_services_names as $key_1 => $financial_services_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $financial_services_name;
                    $item_slug = get_item_slug();
                    $item_description = $financial_services_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Financial Services
                 */
            }

            if($key == 'Education')
            {
                /**
                 * Start custom fields for Education
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Adult Education,Art Classes,College Counseling,Colleges & Universities,Educational Services,Elementary Schools,Middle Schools & High Schools,Montessori Schools,Preschools,Private Tutors,Religious Schools,Special Education,Specialty Schools,Tasting Classes,Test Preparation,Tutoring Centers,Private Schools,Waldorf Schools',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Offering a Deal,Accepts Credit Cards,Good for Kids,Wheelchair Accessible,By Appointment Only,Dogs Allowed,Sells Gift Certificates,Offers Military Discount,Gender Neutral Restrooms,Open to All',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Parking',
                        'custom_field_seed_value' => 'Street,Garage,Private Lot,Validated,Valet',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Request Information',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Education
                 */

                /**
                 * Start items for Education
                 */
                $education_names = [
                    "The Homework Corner",
//                    "Growing Trees Chinese Academy",
//                    "Imagine Preschool",
//                    "Yail Academy",
//                    "Whiting Woods Montessori",
//                    "Mt Olive Willalee Preschool",
//                    "Lincoln Elementary School",
//                    "Elite Art Class",
//                    "Royal Education",
//                    "St James - Holy Redeemer School",
//                    "Valley View Elementary School",
                ];

                foreach($education_names as $key_1 => $education_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $education_name;
                    $item_slug = get_item_slug();
                    $item_description = $education_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Education
                 */
            }

            if($key == 'Religious Organizations')
            {
                /**
                 * Start custom fields for Religious Organizations
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Buddhist Temples,Churches,Hindu Temples,Mosques,Sikh Temples,
                        Synagogues',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 7,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Religious Organizations
                 */


                /**
                 * Start items for Religious Organizations
                 */
                $religious_org_names = [
                    "CV Church",
//                    "Christ Armenian Church",
//                    "Holy Redeemer Catholic Church",
//                    "Summit Christian Church",
//                    "Holy Gate Evangelical Church",
//                    "Montrose Church",
//                    "Lutheran Churches",
//                    "La Crescenta Presbyterian Church",
//                    "Crescenta Valley United Methodist Church",
//                    "New Song Evangelical Church",
                ];

                foreach($religious_org_names as $key_1 => $religious_org_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $religious_org_name;
                    $item_slug = get_item_slug();
                    $item_description = $religious_org_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Religious Organizations
                 */
            }

            if($key == 'Mass Media')
            {
                /**
                 * Start custom fields for Mass Media
                 */
                $custom_fields_ids = array();
                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Type',
                        'custom_field_seed_value' => 'Print Media,Radio Stations,Television Stations',
                        'custom_field_order' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_SELECT,
                        'custom_field_name' => 'Price Range',
                        'custom_field_seed_value' => '$,$$,$$$,$$$$',
                        'custom_field_order' => 2,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'General Features',
                        'custom_field_seed_value' => 'Accepts Credit Cards',
                        'custom_field_order' => 3,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_MULTI_SELECT,
                        'custom_field_name' => 'Wi-Fi',
                        'custom_field_seed_value' => 'Free,Paid',
                        'custom_field_order' => 4,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_LINK,
                        'custom_field_name' => 'Request a Quote',
                        'custom_field_order' => 5,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();

                DB::table('custom_fields')->insert([
                    [
                        'category_id'       => $category_id,
                        'custom_field_type' => \App\CustomField::TYPE_TEXT,
                        'custom_field_name' => 'Hours',
                        'custom_field_order' => 6,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]);
                $custom_fields_ids[] = DB::getPdo()->lastInsertId();
                /**
                 * End custom fields for Mass Media
                 */

                /**
                 * Start items for Mass Media
                 */
                $mass_media_names = [
                    "Crescenta Valley Weekly",
//                    "Advance Step Marketing",
//                    "Printing Cart",
//                    "The Foothills Paper",
//                    "DFH Network Inc.",
                ];

                foreach($mass_media_names as $key_1 => $mass_media_name)
                {
                    //$country = \App\Country::where('country_abbr', 'US')->first();
                    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
                    $country_id = $country->id;

                    $states = \App\State::where('country_id', $country->id)->get();
                    $state = $states->random();
                    $state_id = $state->id;

                    $cities = \App\City::where('state_id', $state->id)->get();
                    $city = $cities->random();
                    $city_id = $city->id;

                    $item_lat = $city->city_lat;
                    $item_lng = $city->city_lng;

                    $item_postal_code = substr($faker->postcode, 0, 5);

                    $item_featured = rand(0,1) == 1 ? \App\Item::ITEM_FEATURED : \App\Item::ITEM_NOT_FEATURED;
                    $item_title = $mass_media_name;
                    $item_slug = get_item_slug();
                    $item_description = $mass_media_name . " in " . $city->city_name . ", " . $state->state_name . " style brisket, mouthwatering ribs, juicy pulled pork and Southern style sides. Satisfy your cravings at the Farmers Market Saturdays 9am-1pm. Call for catering only orders Mon-Fri 9-5pm.\r\n\r\nA good barbecue is only as good as it's Pitmaster. George has been an avid smoker for years but only began to take it on a serious note after receiving numerous accolades for his mouthwatering recipes and competition style smoking skills.";
                    $item_address = $faker->streetAddress;
                    $item_website = 'http://' . $faker->domainName;
                    //$item_phone = substr($faker->phoneNumber, 0, 12);
                    $item_phone = $faker->tollFreePhoneNumber;

                    DB::table('items')->insert([
                        [
                            'user_id' => rand(1,InstallSeeder::TOTAL_USERS+1),
                            'category_id' => $category_id,
                            'item_status' => \App\Item::ITEM_PUBLISHED,
                            'item_featured' => $item_featured,
                            'item_featured_by_admin' => $item_featured == \App\Item::ITEM_FEATURED ? \App\Item::ITEM_FEATURED_BY_ADMIN : \App\Item::ITEM_NOT_FEATURED_BY_ADMIN,
                            'item_title' => $item_title,
                            'item_slug' => $item_slug,
                            'item_description' => $item_description,
                            'item_address' => $item_address,
                            'item_address_hide' => rand(0,1),

                            'state_id' => $state_id,
                            'city_id' => $city_id,
                            'country_id' => $country_id,

                            'item_postal_code' => $item_postal_code,

                            'item_website' => $item_website,
                            'item_social_facebook' => $item_social_facebook,
                            'item_social_twitter' => $item_social_twitter,
                            'item_social_linkedin' => $item_social_linkedin,

                            'item_phone' => $item_phone,

                            'item_lat' => $item_lat,
                            'item_lng' => $item_lng,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ],
                    ]);

                    $new_item_id = DB::getPdo()->lastInsertId();

                    $item_features_string = '';

                    foreach($custom_fields_ids as $key_2 => $custom_fields_id)
                    {
                        $item_feature_value = '';
                        $custom_field_record = \App\CustomField::find($custom_fields_id);

                        if($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name == 'Type')
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT
                            && $custom_field_record->custom_field_name != 'Type')
                        {
                            $item_feature_value = $custom_field_record->custom_field_seed_value;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_SELECT)
                        {
                            $seed_values_array = explode(',', $custom_field_record->custom_field_seed_value);

                            $item_feature_value = $seed_values_array[rand(0,count($seed_values_array)-1)];
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_LINK)
                        {
                            $item_feature_value = $faker->url;
                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }
                        elseif($custom_field_record->custom_field_type == \App\CustomField::TYPE_TEXT
                            && $custom_field_record->custom_field_name == 'Hours')
                        {
                            $item_feature_value = "Mon 11:00 am - 8:30 pm\r\nTue 11:00 am - 8:30 pm\r\nWed 11:00 am - 8:30 pm\r\nThu 11:00 am - 8:30 pm\r\nFri 11:00 am - 8:30 pm\r\nSat 11:00 am - 8:30 pm\r\nSun 11:00 am - 8:30 pm";

                            DB::table('item_features')->insert([
                                [
                                    'item_id' => $new_item_id,
                                    'custom_field_id' => $custom_fields_id,
                                    'item_feature_value' => $item_feature_value,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                ],
                            ]);
                        }

                        $item_features_string .= $item_feature_value . ' ';
                    }

                    $item_feature_update = \App\Item::find($new_item_id);
                    $item_feature_update->item_features_string = $item_features_string;
                    $item_feature_update->save();
                }
                /**
                 * End items for Mass Media
                 */
            }
        }


    }
}
