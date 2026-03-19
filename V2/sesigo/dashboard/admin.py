from django.contrib import admin
from .models import *
#from .models import Computer_Make,Mobile_Make,Computer_Model,Display_Model,Mobile_Model,Printer_Model,Scanner_Model,Projector_Model,OSSystem,Division,Building,CPU,Location,Custodian,Asset,Project,Loan,Monitor,Desktop,Laptop,Server,Printer,Obsolete,Scanner,Projector,Phone,Other_Asset,DType
from django.urls import reverse
from django.utils.http import urlencode
#######################################
#from import_export.admin import ExportActionMixin
#######################################
# Register your models here.
admin.site.site_header = 'ORI IT Inventory v2.0'
'''
admin.site.register(Computer_Make)
admin.site.register(Mobile_Make)
admin.site.register(Computer_Model)
admin.site.register(Display_Model)
admin.site.register(Mobile_Model)
admin.site.register(Printer_Model)
admin.site.register(Scanner_Model)
admin.site.register(Projector_Model)
#admin.site.register(OSSystem)
admin.site.register(Division)
admin.site.register(Building)
admin.site.register(CPU)
'''
admin.site.register(Computer_Model)
admin.site.register(DType)
admin.site.register(Computer_Make)
#admin.site.register(Location)
#admin.site.register(Asset)
#admin.site.register(Project)
admin.site.register(Scanner_Model)
admin.site.register(Display_Model)
admin.site.register(Printer_Model)
admin.site.register(Projector_Model)

############################################################################################################
#                                               MAIN CLASSES ADMIN                                         #
############################################################################################################


class ComputerInline(admin.TabularInline):
      model = Asset

class CustodianAdmin(admin.ModelAdmin):
      list_display=('surname','firstname','title','dept')
      search_fields=('firstname','surname')
      list_filter=('division',)
      inlines =[ComputerInline,
           ]
admin.site.register(Custodian,CustodianAdmin)


class AssetAdmin (admin.ModelAdmin):
      #fields = ('description',('acode','sno'),('asset_custodian','office'),('date_issued','date_captured'),'comments')
      list_display=('id','acode','sno','category','asset_custodian','office','comments','operative')
      list_filter=('office',)
      search_fields=('acode','sno','category__dtype','asset_custodian_id__firstname','asset_custodian_id__surname')
      #list_display_links =('acode','sno','category')
######################################################################
admin.site.register(Asset,AssetAdmin)

class LocationAdmin(admin.ModelAdmin):
      list_display =('description','block','office','spacecode')
      list_filter=('block',)
      unique_together= ('block','office')
admin.site.register(Location,LocationAdmin)

class LoanAdmin(admin.ModelAdmin):
      list_display = ('ub_code','serial','device_type','loanee','date_loaned','date_returned','reason')

admin.site.register(Loan,LoanAdmin)

class MonitorAdmin(admin.ModelAdmin):
      list_display = ('id','acode','sno','monitor_type','monitor_model','asset_custodian','office')
      search_fields =('acode','sno','monitor_model__d_model','asset_ptr__asset_custodian_id__surname','asset_custodian_id__firstname')
admin.site.register(Monitor,MonitorAdmin)


class DesktopAdmin(admin.ModelAdmin):
      list_display = ('id','acode','serial_no','description','desktop_mmodel','drive_size','ram','user','location','operating_system','operative')
      search_fields = ('acode','sno','desktop_mmodel_id__c_model','asset_ptr__asset_custodian_id__surname','asset_custodian_id__firstname')
admin.site.register(Desktop,DesktopAdmin)
class LaptopAdmin(admin.ModelAdmin):
      list_display = ('id','acode','serial_no','description','laptop_mmodel','drive_size','ram','user','location','operating_system','comments')
      search_fields = ('acode','sno','laptop_mmodel_id__c_model','asset_ptr__asset_custodian_id__surname','asset_custodian_id__firstname')
admin.site.register(Laptop,LaptopAdmin)

class ServerAdmin(admin.ModelAdmin):
      list_display = ('id','acode','serial_no','description','server_mmodel','drive_size','ram','server_ip','fqdn','roles','decomissioned','operating_system')
      search_fields = ('acode','sno','server_mmodel_id__c_model','server_ip','asset_ptr__asset_custodian_id__surname')
admin.site.register(Server,ServerAdmin)

class PrinterAdmin(admin.ModelAdmin):
      list_display = ('id','acode','serial_no','description','printer_pmodel','usage','user','location')
      ordering = ['printer_pmodel']
      search_fields = ('acode','sno','printer_pmodel_id__p_model','asset_ptr__asset_custodian_id__surname','asset_custodian_id__firstname')
admin.site.register(Printer,PrinterAdmin)
############################################################################################################
#                                               LOOKUP  CLASSES ADMIN                                      #
############################################################################################################
class OSSystemAdmin(admin.ModelAdmin):
      unique_together = ['os_fam','os_system','os_architecture']
      ordering =['os_fam','os_system']
admin.site.register(OSSystem,OSSystemAdmin)
############################################################################################################
class ObsoleteAdmin(admin.ModelAdmin): 
      list_display=('acode','sno','device','make_model','status','location')
#class BookAdmin(ImportExportActionModelAdmin):

admin.site.register(Obsolete,ObsoleteAdmin)
class ScannerAdmin(admin.ModelAdmin):
      list_display = ('id','acode','serial_no','scanner_type','scanner_model','user','location')
      search_fields = ('acode','sno','scanner_model__s_model','asset_ptr__asset_custodian_id__surname','asset_custodian_id__firstname')
admin.site.register(Scanner,ScannerAdmin)
class ProjectorAdmin(admin.ModelAdmin):
      list_display = ('id','acode','serial_no','projector_type','projector_model','user','location')
      search_fields = ('acode','sno','projector_model__prj_model','asset_ptr__asset_custodian_id__surname','asset_custodian_id__firstname')
admin.site.register(Projector,ProjectorAdmin)
class PhoneAdmin(admin.ModelAdmin):
      list_display = ('mb_acode','IMEI','mb_make','mb_model','mb_custodian')
admin.site.register(Phone,PhoneAdmin)
class Other_AssetAdmin(admin.ModelAdmin):
      list_display =('id','acode','serial_no','description','om_make','om_model','user','location')
      search_fields = ('acode','sno','asset_ptr__asset_custodian_id__surname','asset_custodian_id__firstname')
admin.site.register(Other_Asset,Other_AssetAdmin)
  
