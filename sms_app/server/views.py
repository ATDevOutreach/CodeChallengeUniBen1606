import os 

from django.shortcuts import render
from django.http import HttpResponse
from django.views.decorators.csrf import csrf_exempt
import africastalking


# Create your views here.

username = os.environ["USERNAME"]
api_key = os.environ["API_KEY"] 
africastalking.initialize(username, api_key)

sms = africastalking.SMS

@csrf_exempt
def index(request):
    if request.method == "POST":
        sender = request.POST["from"]
        message = request.POST["text"]
        
        response = sms.send("I am a fisherman. I sleep all day and work all night!", recipients = [sender,], sender_id="9798")
    
    return HttpResponse(status=200)