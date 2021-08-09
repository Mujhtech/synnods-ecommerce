<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmailTemplate;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $templates = [
            [
                "title" => "Header",
                "type" => "header",
                "content" => '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>%site_title%</title>
                    <link rel="stylesheet" href="%site_url%/vendor/css/email.css">
                </head>
                <body style="margin: 0;">
                <table width="100%" id="mainStructure" border="0" cellspacing="0" cellpadding="0"
                       style="background-color: #e1e1e1;border-spacing: 0;">
                    <!-- START TAB TOP -->
                    <tbody>
                    <tr>
                        <td valign="top" style="border-collapse: collapse;">
                            <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="border-spacing: 0;">
                                <tbody>
                                <tr>
                                    <td valign="top" height="6" style="border-collapse: collapse;">
                                        <table width="800" align="center" border="0" cellspacing="0" cellpadding="0" class="full-width"
                                               style="border-spacing: 0;">
                                            <!-- start space height -->
                                            <tbody>
                                            <tr>
                                                <td height="5" valign="top" style="border-collapse: collapse;"></td>
                                            </tr>
                                            <!-- end space height -->
                                            <tr>
                                                <td height="5" class="remove" style="border-collapse: collapse;"></td>
                                            </tr>
                                            <!-- start space height -->
                                            <tr>
                                                <td height="5" valign="top" style="border-collapse: collapse;"></td>
                                            </tr>
                                            <tr>
                                                <td height="5" class="remove" style="border-collapse: collapse;"></td>
                                            </tr>
                                            <!-- end space height -->
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <!-- END TAB TOP -->
                    <!--START TOP NAVIGATION ?LAYOUT-->
                    <tr>
                        <td align="center" valign="top" class="fix-box" style="border-collapse: collapse;">
                            <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" class="full-width"
                                   style="border-spacing: 0;">
                                <!-- START CONTAINER NAVIGATION -->
                                <tbody>
                                <tr>
                                    <td valign="middle" style="border-collapse: collapse;">
                                        <!-- start top navigation container -->
                                        <table width="800" align="center" border="0" cellspacing="0" cellpadding="0" class="full-width"
                                               style="border-spacing: 0;">
                                            <tbody>
                                            <tr>
                                                <td valign="middle" bgcolor="00a0e0" style="border-collapse: collapse;">
                                                    <!-- start top navigation -->
                                                    <table width="800" align="center" border="0" cellspacing="0" cellpadding="0"
                                                           class="full-width" style="border-spacing: 0;">
                                                        <tbody>
                                                        <tr>
                                                            <td valign="middle" style="border-collapse: collapse;">
                                                                <table border="0" align="left" cellpadding="0" cellspacing="0"
                                                                       class="container2" style="border-spacing: 0;">
                                                                    <tbody>
                                                                    <!--start event date -->
                                                                    <tr>
                                                                        <td valign="middle" align="center"
                                                                            style="border-collapse: collapse;">
                                                                            <table align="right" border="0" cellpadding="0"
                                                                                   cellspacing="0" class="clear-align"
                                                                                   style="border-spacing: 0;">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td style="padding:15px;border-collapse:collapse; height: 70px; line-height: 70px">
                                                                                        <a href="%site_url%" style="color: #fff; text-decoration: none !important;"
                                                                                           target="_blank">
                                                                                            <img title="Logo"
                                                                                                 src="%site_logo%"
                                                                                                 height="70"
                                                                                                 style="max-width: 107px;display: block !important;height: auto !important;"
                                                                                                 alt="Logo" border="0"
                                                                                                 hspace="0"
                                                                                                 vspace="0"></a>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!--end content nav -->
                
                                                                <!--start content nav -->
                                                                <table border="0" align="right" cellpadding="0" cellspacing="0"
                                                                       class="container2" style="border-spacing: 0;">
                                                                    <tbody>
                                                                    <!--start event date -->
                                                                    <tr>
                                                                        <td valign="middle" align="center"
                                                                            style="border-collapse: collapse;">
                                                                            <table align="right" border="0" cellpadding="0"
                                                                                   cellspacing="0" class="clear-align"
                                                                                   style="border-spacing: 0;">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td style="font-size: 13px;line-height: 22px;color: #FFF;padding: 15px;font-weight: normal;text-align: center;font-family: Tahoma, Helvetica, Arial, sans-serif;border-collapse: collapse;"><span style="display: inline-block; height: 70px; line-height: 70px;">%date_time%</span></td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!--end content nav -->
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- end top navigation -->
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!-- end top navigation container -->
                                    </td>
                                </tr>
                                <!-- END CONTAINER NAVIGATION -->
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <!--END TOP NAVIGATION LAYOUT-->
                    <!-- START MAIN CONTENT-->
                    <tr>
                        <td align="center" valign="top" class="fix-box" style="border-collapse: collapse;">
                            <!-- start layout-7 container -->
                            <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" class="full-width"
                                   style="border-spacing: 0;">
                                <tbody>
                                <tr>
                                    <td valign="top" style="border-collapse: collapse;">
                                        <table width="800" align="center" border="0" cellspacing="0" cellpadding="0" class="container"
                                               bgcolor="#ffffff" style="background-color: #ffffff;border-spacing: 0;">
                                            <!--start space height -->
                                            <tbody>
                                            <tr>
                                                <td height="30" style="border-collapse: collapse;"></td>
                                            </tr>
                                            <!--end space height -->
                                            <tr>
                                                <td style="min-height: 400px; padding: 15px; font-size: 13px;">
                ',
                "status" => true
            ],
            [
                "title" => "Footer",
                "type" => "footer",
                "content" => '</td>
                </tr>
                <!--start space height -->
                <tr>
                    <td height="28" style="border-collapse: collapse;"></td>
                </tr>
                <!--end space height -->
                </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>
                <!-- end layout-7 container -->
                </td>
                </tr>
                <!-- END MAIN CONTENT-->
                <!-- START FOOTER-BOX-->
                <tr>
                    <td align="center" valign="top" class="fix-box" style="border-collapse: collapse;">
                        <!-- start layout-7 container -->
                        <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" class="full-width"
                               style="border-spacing: 0;">
                            <tbody>
                            <tr>
                                <td valign="top" style="border-collapse: collapse;">
                                    <table width="800" align="center" border="0" cellspacing="0" cellpadding="0" class="full-width"
                                           bgcolor="#3a3a3a" style="border-spacing: 0;">
                                        <!--start space height -->
                                        <tbody>
                                        <tr>
                                            <td height="20" style="border-collapse: collapse;"></td>
                                        </tr>
                                        <!--end space height -->
                                        <tr>
                                            <td valign="top" align="center" style="border-collapse: collapse;">
                                                <!-- start logo footer and address -->
                                                <table width="760" align="center" border="0" cellspacing="0" cellpadding="0"
                                                       class="container" style="border-spacing: 0;">
                                                    <tbody>
                                                    <tr>
                                                        <td valign="top" style="border-collapse: collapse;">
                                                            <!--start icon navigation -->
                                                            <table width="100%" border="0" align="center" cellpadding="0"
                                                                   cellspacing="0" style="border-spacing: 0;">
                                                                <tbody>
                                                                <tr>
                                                                    <td valign="top" align="center"
                                                                        style="border-collapse: collapse;">
                                                                        <table width="100%" border="0" align="left" cellpadding="0"
                                                                               cellspacing="0" class="full-width"
                                                                               style="border-spacing: 0;">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td align="left" valign="middle"
                                                                                    class="clear-padding"
                                                                                    style="border-collapse: collapse;">
                                                                                    <table width="760" border="0" align="left"
                                                                                           cellpadding="0" cellspacing="0"
                                                                                           class="col-2" style="border-spacing: 0;">
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td height="10"
                                                                                                style="border-collapse: collapse;"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="font-size: 13px;line-height: 15px; text-align: center; font-family: Arial,Tahoma, Helvetica, sans-serif;color: #a7a9ac;font-weight: normal;border-collapse: collapse;">
                                                                                                © Copyright %date_year%. All rights reserved.
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <!-- end logo footer and address -->
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!--start space height -->
                                                    <tr>
                                                        <td height="20" style="border-collapse: collapse;"></td>
                                                    </tr>
                                                    <!--end space height -->
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <!-- start space height -->
                                        <tr>
                                            <td height="10" valign="top" style="border-collapse: collapse;"></td>
                                        </tr>
                                        <!-- end space height -->
                                        </tbody>
                                    </table>
                                    <!-- end layout-FOOTER-BOX container -->
                                </td>
                            </tr>
                            <!-- END FOOTER-BOX-->
                            <!-- START FOOTER COPY RIGHT  -->
                            <tr>
                                <td align="center" valign="top" class="fix-box" style="border-collapse: collapse;">
                                    <!-- start layout-7 container -->
                                    <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" class="full-width"
                                           style="border-spacing: 0;">
                                        <!-- start space height -->
                                        <tbody>
                                        <tr>
                                            <td height="5" valign="top" style="border-collapse: collapse;"></td>
                                        </tr>
                                        <!-- end space height -->
                                        <tr>
                                            <td align="center" valign="top" style="border-collapse: collapse;">
                                                <table width="800" align="center" border="0" cellspacing="0" cellpadding="0"
                                                       class="container" style="border-spacing: 0;">
                                                    <tbody>
                                                    <tr>
                                                        <td valign="top" align="center" style="border-collapse: collapse;">
                                                            <table width="560" align="center" border="0" cellspacing="0"
                                                                   cellpadding="0" class="container" style="border-spacing: 0;">
                                                                <tbody>
                                                                <tr>
                                                                    <!-- start COPY RIGHT content -->
                                                                    <td valign="top" align="center"
                                                                        style="font-size: 11px;line-height: 22px;font-family: Arial,Tahoma, Helvetica, sans-serif;color: #919191;font-weight: normal;border-collapse: collapse;">
                                                                        Email is sent from %site_title%.
                                                                    </td>
                                                                    <!-- end COPY RIGHT content -->
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--  END FOOTER COPY RIGHT -->
                                        <!-- start space height -->
                                        <tr>
                                            <td height="20" valign="top" style="border-collapse: collapse;"></td>
                                        </tr>
                                        <!-- end space height -->
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
                </table>
                </body>
                </html>
                ',
                "status" => true
            ],
            [
                "title" => "Reset Password",
                "type" => "reset_password",
                "content" => "%header%
                <strong>Hello!</strong> <br /><br />
                You are receiving this email because we received a password reset request for your account. <br /><br />
                <a href='%reset_link%'>Reset password</a> <br /><br />
                If you did not request a password reset, no further action is required. <br /><br />
                Regards, <br />
                <strong>%site_title%</strong>
                <hr />
                If you’re having trouble clicking the 'Reset Password' button, copy and paste the URL below into your web browser: %reset_link%
                
                %footer%
                ",
                "status" => true
            ],
            [
                "title" => "Contact Form",
                "type" => "contact_form",
                "content" => '%header%

                <table width="100%">
                    <tbody>
                        <tr>
                            <td class="wrapper" width="700" align="center">
                                <table class="section" cellpadding="0" cellspacing="0" width="700" bgcolor="#f8f8f8">
                                    <tr>
                                        <td class="column" align="left">
                                            <table>
                                                <tbody>
                                                <tr>
                                                    <td align="left" style="padding: 20px 50px;">
                                                        <p><strong>Hello, there is a new message for you from your site:</strong></p>
                                                        <p><img src="%site_url%/vendor/core/core/base/images/emails/person.png"
                                                                alt="From" width="20" style="margin-right: 10px;" /> %contact_name%</p>
                                                        <p><img src="%site_url%/vendor/core/core/base/images/emails/edit.png"
                                                                alt="Subject" width="20" style="margin-right: 10px;" /> %contact_subject%</p>
                                                        <p><img src="%site_url%/vendor/core/core/base/images/emails/email.png"
                                                                alt="Email" width="20" style="margin-right: 10px;" /> %contact_email%</p>
                                                        <p><img src="%site_url%/vendor/core/core/base/images/emails/map.png"
                                                                alt="Address" width="20" style="margin-right: 10px;" /> %contact_address%</p>
                                                        <p><img src="%site_url%/vendor/core/core/base/images/emails/phone.png"
                                                                alt="Phone" width="20" style="margin-right: 10px;" /> %contact_phone%</p>
                                                        <p><img src="%site_url%/vendor/core/core/base/images/emails/message.png"
                                                                alt="Message" width="20" style="margin-right: 10px;" /> %contact_content%</p>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                
                        <tr>
                            <td class="wrapper" width="700" align="center">
                                <table class="section main" cellpadding="0" cellspacing="0" width="700">
                                    <tr>
                                        <td class="column" align="center">
                                            <table>
                                                <tbody>
                                                <tr>
                                                    <td align="center">
                                                        <p>You can reply an email to %contact_email% by clicking on below button.</p> <br />
                                                        <a href="mailto:%contact_email%" class="action-button">Answer</a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                %footer%
                ',
                "status" => true
            ],
            [
                "title" => "Welcome to %site_title%",
                "type" => "welcome_user",
                "content" => '%header%

                <p>Hi %customer_name%!</p>
                <p>Welcome to %site_title%!</p>
                <p>If you need any help, feel free to response to this email!</p>
                <p><a href="%site_url%" class="action-button" style="border: solid 1px #fff;
                    -webkit-border-radius: 7px;
                    -moz-border-radius: 7px;
                    border-radius: 7px;
                    font-size: 14px;
                    font-weight: bold;
                    font-style: normal;
                    font-stretch: normal;
                    line-height: 1.43;
                    letter-spacing: 0.5px;
                    text-align: center;
                    color: #fff !important;
                    text-decoration: none !important;
                    padding: 10px 30px;
                    margin: 0 0 30px;
                    display: inline-block;
                    text-transform: uppercase;
                    background-color: #1280f5;">Start buying!</a></p>
                
                <p>Cheers,</p>
                
                %footer%
                ',
                "status" => true
            ],
            [
                "title" => "Confirm Email",
                "type" => "confirm_email",
                "content" => '%header%

                <strong>Hello!</strong> <br /><br />
                
                Please verify your email address in order to access this website. Click on the button below to verify your email.. <br /><br />
                
                <a href="%verify_link%">Verify now</a> <br /><br />
                
                Regards, <br />
                
                <strong>%site_title%</strong>
                
                <hr />
                
                If you’re having trouble clicking the "Verify now" button, copy and paste the URL below into your web browser: %verify_link%
                
                %footer%
                ',
                "status" => true
            ],
            [
                "title" => "Order confirmation",
                "type" => "order_confirm",
                "content" => '%header%

                <h2>Order successfully!</h2>
                
                <p>Hi %customer_name%,</p>
                <p>Thank you for purchasing our products, we will contact you via phone <strong>%customer_phone%</strong> to confirm order!</p>
                
                %product_list%
                
                <h3>Customer information</h3>
                
                <p>%customer_name% - %customer_phone%, %customer_address%</p>
                
                <h3>Shipping method</h3>
                <p>%shipping_method%</p>
                
                <h3>Payment method</h3>
                <p>%payment_method%</p>
                
                <br />
                
                <p>If you have any question, please contact us via <a href="mailto:%site_admin_email%">%site_admin_email%</a></p>
                
                %footer%
                
                ',
                "status" => true
            ],
            [
                "title" => "Order cancel",
                "type" => "order_cancel",
                "content" => '%header%

                <h2>Your order has been cancelled</h2>
                
                <p>Hi %customer_name%,</p>
                <p>Your order <strong>%order_id%</strong> has been canceled as you requested and your payment was cancelled too.</p>
                
                <br />
                
                <p>If you have any question, please contact us via <a href="mailto:%site_admin_email%">%site_admin_email%</a></p>
                
                %footer%
                ',
                "status" => true
            ],
            [
                "title" => "Delivery confirmation",
                "type" => "delivery_confirm",
                "content" => '%header%

                <h2>Your order is delivering!</h2>
                
                <p>Hi %customer_name%,</p>
                
                <p>Your products are on the way.</p>
                
                <p>If you have any question, please contact us via <a href="mailto:%site_admin_email%">%site_admin_email%</a></p>
                
                %footer%                
                ',
                "status" => true
            ],
            [
                "title" => "Order confirmed %order_id%",
                "type" => "order_confirm_by_admin",
                "content" => '%header%

                <h2>Your order has been cancelled</h2>
                
                <p>Hi %customer_name%,</p>
                <p>Your order <strong>%order_id%</strong> has been canceled as you requested and your payment was cancelled too.</p>
                
                <br />
                
                <p>If you have any question, please contact us via <a href="mailto:%site_admin_email%">%site_admin_email%</a></p>
                
                %footer%
                ',
                "status" => true
            ],
            [
                "title" => "Verify Account",
                "type" => "verify_account",
                "content" => "%header%
                <strong>Hello!</strong> <br /><br />
                <h1>%email_code%</h1>
                You are receiving this email because you registered on our website. <br /><br />
                <a href='%verify_link%'>Verify Account</a> <br /><br />
                Regards, <br />
                <strong>%site_title%</strong>
                <hr />
                If you’re having trouble clicking the 'Verify Account' button, copy and paste the URL below into your web browser: %verify_link%
                
                %footer%
                ",
                "status" => true
            ],
        ];

    	foreach ($templates as $template) {
    		$existing = EmailTemplate::where('type', $template['type'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
            EmailTemplate::create($template);
    	}
    }
}
