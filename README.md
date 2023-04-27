# aws-dynamo-db-terraform
This project is an assignment given by the Azubi team test our skills on AWS DynamoDB and Terraform. Terraform was used to provision the dynamodb resources for the app

## Technologies Used
1. AWS DynamoDB
2. Terraform
3. Docker
4. PHP Compose

# Docker
The app can be tested locally by running a docker container.
**The image can be pulled from docker hub with this command: docker image pull kofihervie/docker-web-app:3.0**


# AWS DynamoDb 
An IAM role granting privileges to the IAM user for dynamo had to be created. This was the most important step before provisioning resources with Terraform. 

# Terraform 
Terraform is an Infrastructure-As-Code platform used to provision resources on cloud platforms. 

#### Provisioning resources with Terraform
1. Set environment variable for AWS secret access key and access key ID
2. Navigate to folder containing Terraform file using your terminal
3. In your terminal, type **terraform init**
4. In your terminal, type **terraform apply**

# PHP Compose
1. Download PHP Compose from this site: **https://getcomposer.org/download/**
2. Install aws-sdk-php using compose : **composer require aws/aws-sdk-php**

# Logging into the App
1. Username for login page : **kofi**
2. Password for login page: **1234**


