import os 

from django.shortcuts import render
from django.http import HttpResponse
from django.views.decorators.csrf import csrf_exempt
import africastalking



USERNAME = os.environ["USERNAME"]
API_KEY = os.environ["API_KEY"] 

#initialize api
africastalking.initialize(USERNAME, API_KEY)

sms = africastalking.SMS

#we aren't using a form, so csrf isn't needed
@csrf_exempt
def sms_reply(request):
    if request.method == "POST":
        sender = request.POST["from"] 
        message = request.POST["text"]
        
        reply_message = "I am a fisherman. I sleep all day and work all night!" 

        sms.send(reply_message, recipients = [sender,], sender_id="9798")
    
    return HttpResponse(status=200)