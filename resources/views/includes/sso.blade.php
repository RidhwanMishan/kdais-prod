@php
    ////////////////////////////////////////////////////////////////////////
    // bepa-sso 2021-04-25
    /* Get oauth2 token using a POST request */
    $curlPostToken = curl_init();

    curl_setopt_array($curlPostToken, array(
        CURLOPT_URL => "https://login.windows.net/common/oauth2/token",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array(
            'grant_type' => 'password',
            'scope' => 'openid',
            'resource' => env('POWERBI_API'),
            'client_id' => env('OAUTH_APP_ID'),
            'username' => env('POWERBI_TOKEN_USERID'),
            'password' => env('POWERBI_TOKEN_PASSWORD')
        )
    ));

    $tokenResponse = curl_exec($curlPostToken);
    $tokenError = curl_error($curlPostToken);
    curl_close($curlPostToken);
    //dd($tokenResponse);

    // decode result, and store the access_token in $embeddedToken
    $tokenResult = json_decode($tokenResponse, true);
    //dd($tokenResult);
    $token = $tokenResult["access_token"];
    $embeddedToken = "Bearer "  . ' ' .  $token;
    //dd($embeddedToken);

    $curlPostToken = curl_init();
    
    //var_dump($security_roles);
    //die();

    //dd($powerBiEmail);
    //dd($security_roles_clean);

    if(isset($noIdentity))
    {
        $api_body=array(
            'datasets' => array(
                array(
                    "id" => $datasetId
                )                
            ),
            'reports' => array(
                array(
                    "id" => $reportId
                )
            )
        );
    }

    else{
    $api_body=array(
            'datasets' => array(
                array(
                    "id" => $datasetId
                )                
            ),
            'reports' => array(
                array(
                    "id" => $reportId
                )
            ),
            'identities' => array(
                array(
                    'username' => $powerBiEmail,
                    'roles' => $security_roles_clean,
                    'datasets' => array(
                        $datasetId
                    )
                )
            )
        );
    }

    $post_api_body = json_encode($api_body);
    //dd ($post_api_body);

    curl_setopt_array($curlPostToken, array(
        CURLOPT_URL => "https://api.powerbi.com/v1.0/myorg/GenerateToken",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
            "Authorization: $embeddedToken",
            "Cache-Control: no-cache",
            "Content-Type: application/json"
            ),        
        CURLOPT_POSTFIELDS => $post_api_body
    ));

    $tokenResponse = curl_exec($curlPostToken);
    $tokenError = curl_error($curlPostToken);
    curl_close($curlPostToken);
    //dd($tokenResponse);

    // decode result, and store the access_token in $embeddedToken
    $tokenResult = json_decode($tokenResponse, true);
    //dd($tokenResult);
    $token = $tokenResult["token"];
    $embeddedToken = "Bearer "  . ' ' .  $token;
    //dd($embeddedToken);

    // $curlGetUrl = curl_init();

    // curl_setopt_array($curlGetUrl, array(

    //     CURLOPT_URL => "https://api.powerbi.com/v1.0/myorg/groups/".env('POWERBI_WORKSPACE_GROUP_ID')."/reports",
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 30,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "GET",
    //     CURLOPT_HTTPHEADER => array(
    //         "Authorization: $embeddedToken",
    //         "Cache-Control: no-cache",
    //         )
    //    )
    // );

    // $embedResponse = curl_exec($curlGetUrl);
    // $embedError = curl_error($curlGetUrl);
    // dd($embedResponse);

    // curl_close($curlGetUrl);

    // if ($embedError) {
    //     dd("cURL Error #:" . $embedError);
    // } else {
    //     $embedResponse = json_decode($embedResponse, true);
    //     //dd($embedResponse);
    //     $embedUrl = $embedResponse['value'][0]['embedUrl'];
    //     //dd("Embed URL: " . $embedUrl);
    // }
    
    $embedUrl = 'https://app.powerbi.com/reportEmbed?reportId='.$reportId;
    //dd ($embedUrl);

    ////////////////////////////////////////////////////////////////////////
@endphp

@section('salesContent')

    <script>
        // Get models. models contains enums that can be used.
        var models = window['powerbi-client'].models;

        // https://github.com/Microsoft/PowerBI-JavaScript/wiki/Embed-Configuration-Details.
        var embedConfiguration= {
            type: 'report',
            tokenType: models.TokenType.Embed,
            accessToken: "<?php echo $token; ?>" ,
            id: "<?php echo $reportId ?>", // the report ID
            embedUrl: "<?php echo $embedUrl ?>",
            settings: {
                panes:{
                    bookmarks: {
                        visible: false
                    },
                    fields: {
                        expanded: false
                    },
                    filters: {
                        expanded: false,
                        visible: false
                    },
                    pageNavigation: {
                        visible: false
                    },
                    selection: {
                        visible: true
                    },
                    syncSlicers: {
                        visible: true
                    },
                    visualizations: {
                        expanded: false
                    }
                }
            }
        };
        var $reportContainer = $('#reportContainer');
        var report = powerbi.embed($reportContainer.get(0), embedConfiguration);
    </script>
    
@endsection