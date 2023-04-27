terraform {
  required_providers {
    aws = {
      source = "hashicorp/aws"
    }
  }
}

provider "aws" {
  region = "us-east-1"
  # shared_credentials_files = ["$HOME/ .aws/credentials"]
}

resource "aws_dynamodb_table" "GuestBook" {
  name           = "GuestBook"
  billing_mode   = "PROVISIONED"
  read_capacity  = "30"
  write_capacity = "30"
  hash_key       = "Email"
  range_key      = "Name"

  attribute {
    name = "Email"
    type = "S"
  }
  attribute {
    name = "Name"
    type = "S"
  }

  attribute {
    name = "Phone"
    type = "S"
  }



  local_secondary_index {
    name            = "guestbook_lsi"
    range_key       = "Phone"
    projection_type = "ALL"
  }

}

# create dummy data

resource "aws_dynamodb_table_item" "GuestBook1" {
  table_name = "GuestBook"
  hash_key   = "Email"
  range_key  = "Name"

  item = <<ITEM
{
  "Email": {"S": "kofi@azubi.com"},
  "Name": {"S": "Kofi Hervie"},
  "Phone": {"S": "+2334445556666"}
 
}
ITEM
}

resource "aws_dynamodb_table_item" "GuestBook2" {
  table_name = "GuestBook"
  hash_key   = "Email"
  range_key  = "Name"
  item       = <<ITEM
{
  "Email": {"S": "max@azubi.com"},
  "Name": {"S": "Maxwell"},
  "Phone": {"S": "+2334445556666"}
 
}
ITEM
}

resource "aws_dynamodb_table_item" "GuestBook3" {
  table_name = "GuestBook"
  hash_key   = "Email"
  range_key  = "Name"
  item       = <<ITEM
{
  "Email": {"S": "aaron@azubi.com"},
  "Name": {"S": "aaron"},
  "Phone": {"S": "+2334445556666"}
 
}
ITEM
}

resource "aws_dynamodb_table_item" "GuestBook4" {
  table_name = "GuestBook"
  hash_key   = "Email"
  range_key  = "Name"
  item       = <<ITEM
{
  "Email": {"S": "John@azubi.com"},
  "Name": {"S": "John"},
  "Phone": {"S": "+2334445556666"}
 
}
ITEM
}