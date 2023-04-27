<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" >
    <title>Meet the Team</title>
</head>
<body>
    <main>
    <?php
                                        require 'vendor/autoload.php';
                                        require_once('.env.php');

                                        // Set up AWS SDK for PHP
                                        
                                        use Aws\DynamoDb\Marshaler;
                                        use Aws\Credentials\CredentialProvider;
                                        use Aws\DynamoDb\DynamoDbClient;
                                        use Aws\Sts\StsClient;
                                        use Aws\Credentials\AssumeRoleCredentialProvider;

                                        $access_key_id = getenv('ACCESS_KEY_ID');
                                        $iam_role = getenv('IAM_ROLE');
                                        $secret_access_key = getenv('SECRET_ACCESS_KEY');

                                        //Create an STS client with your AWS credentials
                                        $stsClient = new StsClient([
                                            'region' => 'us-east-1',
                                            'version' => 'latest',
                                            'credentials' => [
                                                'key' => $access_key_id,
                                                'secret' => $secret_access_key,
                                            ],
                                        ]);

                                        // Specify ARN of IAM role
                                        $roleArn = $iam_role;

                                        

                                        // Call the AssumeRole API action, passing in the role ARN and source ARN
                                        $result = $stsClient->assumeRole([
                                        'RoleArn' => $roleArn,
                                        'RoleSessionName' => 'dynamo',
                                        'DurationSeconds' => 3600,
                                        
                                        ]);

                                        $credentials = $result->get('Credentials');

                                        
                                        
                                        // Create a DynamoDB client with the temporary credentials
                                        $dynamoDbClient = new DynamoDbClient([
                                        'region' => 'us-east-1',
                                        'version' => 'latest',
                                        // 'credentials' => $assumeRoleProvider,
                                        'credentials' => [
                                            'key' => $credentials['AccessKeyId'],
                                            'secret' => $credentials['SecretAccessKey'],
                                            'token' => $credentials['SessionToken'],
                                            ],
                                        ]);
                                        


                                        $client = $dynamoDbClient;
                                        // $tableName = 'GuestBook';

                                        
                                        // this converts output from AWS into arrays to extract your data
                                        $marshaler = new Marshaler();

                                        $params = [
                                            'TableName' => 'GuestBook',
                                        ];

                                        $answer = $client->scan($params);
                                        ?>

                                        
                                    
      
            <div class="outer-box-teams">
                <div class="inner-box">
                    <div class="teams-container">
                        <form>
                            <div class="logo">
                                <img src="img/pear.jpg"  alt="codeigniters">
                                <h4>codeigniters</h4>
                            </div>
    
                            <div class="title">
                                <h2>Meet the Team!!</h2>
                            </div>
    
                            
                        </form>
                    </div>
                    <div class="teams">
                    <?php

                                            foreach ($answer['Items'] as $item) {
                                                $record = $marshaler->unmarshalItem($item);
                                                ?>
                                            <div class="card">
                                            <img src="img/pear.jpg" alt="John" style="width:10%">
                                            <h1> <?php echo $record['Name'] ?></h1>
                                            <p class="titlename"><?php echo $record['Email'] ?> </p>
                                            <p><?php echo $record['Phone'] ?></p>

                                            </div>
                                            
                                            
                                       <?php  }?>
                    
                   

                
                                    

                                    
                                    
                                    
                                
                    
                </div>
            </div>
        
    </main>
</body>
</html>