from django.contrib import admin
from .models import Computer_Make,Mobile_Make,Computer_Model,Display_Model,Mobile_Model,Printer_Model,Scanner_Model,Projector_Model,OSSystem,Division,Building,CPU,Location,Custodian,Asset,Project,Computer
from django.urls import reverse
from django.utils.http import urlencode
# Register your models here.
admin.site.site_header= 'ORI IT Inventory 2022'
admin.site.register(Computer_Make)
admin.site.register(Mobile_Make)
admin.site.register(Computer_Model)
admin.site.register(Display_Model)
admin.site.register(Mobile_Model)
admin.site.register(Printer_Model)
admin.site.register(Scanner_Model)
admin.site.register(Projector_Model)
admin.site.register(OSSystem)
admin.site.register(Division)
admin.site.register(Building)
admin.site.register(CPU)
admin.site.register(Location)
#admin.site.register(Asset)
admin.site.register(Project)
admin.site.register(Computer)

class CustodianAdmin(admin.ModelAdmin):
      search_fields=('firstname','surname')
      list_filter=('department',)
admin.site.register(Custodian,CustodianAdmin)

class AssetAdmin (admin.ModelAdmin):
      list_display=('acode','sno','description','asset_custodian','office','view_computers_link')
      #######################################################################
      def view_computers_link(self, obj):
          from django.utils.html import format_html
          url = (
            reverse("admin:dashboard_computer_changelist")
            + "?"
            + urlencode({"assets__id": f"{obj.id}"})
          )
          return format_html('<a href="{}">Computers</a>', url)
          #######################################################################
      view_computers_link.short_description = "Computers"
admin.site.register(Asset,AssetAdmin)


