from django.shortcuts import render
from django.http import HttpResponse
###############################################
#from  django.views.decorators.csrf import csrf_exempt
###############################################
# Create your views here.
#@csrf_exempt
from .models import *
from django.http import JsonResponse
def  home(request):
     labels = []
     data = []
     all_assets = Asset.objects.count()
     desktops = Asset.objects.filter(category_id="Desktop").count()
     servers = Asset.objects.filter(category_id="Server").count()
     laptops = Asset.objects.filter(category_id="Laptop").count()
     displays = Asset.objects.filter(category_id="Display").count()
     printers = Asset.objects.filter(category_id="Printer").count()
     scanners = Asset.objects.filter(category_id="Scanner").count()
     projectors = Asset.objects.filter(category_id="Projector").count()
     phones = Phone.objects.count()
     others =Other_Asset.objects.count()
     all_totals={
               'all':all_assets,
               'desktops':desktops,
               'laptops':laptops,
               'servers': servers,
               'displays':displays,
               'printers':printers,
               'scanners':scanners,
               'projectors':projectors,
               'phones': phones,
               'others':others,
                 }
     for key,value in all_totals.items():
         labels.append(key)
         data.append(value)
     return  render (request,'./dashboard/graphs/main.html',{'labels':labels,'data':data,})
     #return JsonResponse({'totals':all_totals})
