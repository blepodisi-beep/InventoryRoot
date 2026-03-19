from django.db import models
from django.db import models
################################################################################
from django.core.exceptions import ValidationError
from django.utils.translation import gettext_lazy as _
from django.core.validators import MaxValueValidator, MinValueValidator
from django.forms import ModelChoiceField
import datetime
################################################################################
# Create your models here.


#######################################################################################
#                    LOOKUP TABLES FOR MAIN TABLES                                    #
#######################################################################################
#1. Computer_Make : for all computer devices
#2. Mobile_Make: for mobile phones
#3. Computer_Mode1
#4  Mobile_Model
#5. Display_Model
#6. Printer_Model
#7. Scanner_Model
#8  Projector_Model
#9. OS
#10.Division(departments/units/sections)
#11.Building
#12.Contacts(abstract)
#13.status(abstract)
#14.cpu
#15.Location
#16. Dtype, device types lookup
#######################################################################################
#1.Computer_Make : for all computer devices and pheripheral devices
class Computer_Make(models.Model):
      make=models.CharField(max_length=30,unique=True)
      def __str__(self):
            return self.make

#2.Mobile_Make for mobile devices
class Mobile_Make(models.Model):
      m_make= models.CharField(max_length=30,unique=True)
      def __str__(self):
        return self.m_make

#3.Computer_Models : models for Computers(System Units/CPUs)
class Computer_Model(models.Model):
      ctype=(
            ('Desktop','Desktop'),
            ('Laptop','Laptop'),
	    ('Server','Server'),
	    )
      c_type=models.CharField(max_length=30,choices=ctype,null=False)
      c_make=models.ForeignKey(Computer_Make,on_delete=models.CASCADE)
      c_model=models.CharField(max_length=40,)
      def __str__(self):
            return '%s  %s' % (self.c_make, self.c_model)
      class Meta:
            unique_together=['c_make','c_model']
            ordering = ['c_make','c_model']
#4 Mobile _Model 
class Mobile_Model(models.Model):
      mdevice_type=(
            ('phone','phone'),
            ('camera','camera'),
            ('gps','gps'),
            )
      m_type = models.CharField(max_length=30,choices=mdevice_type,default='phone')
      m_make= models.ForeignKey(Mobile_Make,on_delete=models.CASCADE)
      m_model=models.CharField(max_length=50)
      def __str__(self):
          return  '%s %s' % (self.m_make, self.m_model)
 
#5. Display_Model Models for all Displays /Screen
class Display_Model(models.Model):
      dtype=(
            ('CRT','CRT'),
            ('LCD','LCD'),
            ('LED','LED'),
            )
      d_type=models.CharField(max_length=30,choices=dtype,null=False,default='LCD')
      d_make=models.ForeignKey(Computer_Make,on_delete=models.CASCADE)
      d_model=models.CharField(max_length=40)
      def __str__(self):
            return '%s  %s' % (self.d_make, self.d_model)
#6. Printer_Model : for all printing devices
class Printer_Model(models.Model):
      ptype_choices=(
            ('local','local'),
            ('network','network')
      )
      p_make=models.ForeignKey(Computer_Make,on_delete=models.CASCADE)
      p_model =models.CharField(max_length=50)
      p_type=models.CharField(max_length=50,choices=ptype_choices,default='local')
      def __str__(self):
             return '%s %s' % (self.p_make, self.p_model)
#7. Scanner_Model : Models for all scanners
class Scanner_Model(models.Model):
      stype_choices=(
            ('flatbed','flatbed'),
            ('sheet-fed','sheet-fed')
      )
      s_make=models.ForeignKey(Computer_Make,on_delete=models.CASCADE)
      s_model =models.CharField(max_length=50)
      s_type=models.CharField(max_length=50,choices=stype_choices,default='flatbed')
      def __str__(self):
             return '%s %s' % (self.s_make, self.s_model)
#8. Projector_Model
class Projector_Model(models.Model):

      prj_make=models.ForeignKey(Computer_Make,on_delete=models.CASCADE)
      prj_model =models.CharField(max_length=50)
      def __str__(self):
             return '%s %s' % (self.prj_make, self.prj_model)
#9. OS: Operating Systems 
class OSSystem(models.Model): #lookup model for operating systems
      os_choices=(
            ("Windows","Windows"),
            ("Linux","Linux"),
            ("Apple","Apple"),
            ("WMware","VMWare"),
      )
      bit=(
           ("32-bit","32-bit"),
	   ("64-bit","64-bit"),
      )
      ostype_choice=(
                    ("client","client"),
                    ("server","server")
                    )
      os_type= models.CharField(max_length=10,choices=ostype_choice,default="client")
      os_fam=models.CharField(max_length=30,choices=os_choices)
      os_system=models.CharField(max_length=50)
      os_architecture=models.CharField(max_length=10,choices= bit,default="64-bit")
      def __str__ (self):
            return '%s %s %s' % (self.os_fam, self.os_system, self.os_architecture)
#10.Division(departments/units/sections)
class Division(models.Model):
      name =models.CharField(max_length=50,unique=True)
      def __str__(self):
            return self.name
#11. Building :blocks 
class Building(models.Model): #building lookup table
      btype_choices=(
            ('Porta Cabins','Porta Cabins'),
            ('Permanent Structure','Permanent Structure'),

      )
      building=models.CharField(max_length=30,unique=True)
      building_type =models.CharField(max_length=20,choices=btype_choices,default='Porta Cabins')
      description=models.CharField(max_length=50,blank=True)
      def __str__(self):
            return  self.building
#12.Contacts(abstract): For custodians
class Contacts(models.Model):#contacts abstract class
      office =models.CharField(max_length=10,blank=True,default='7200')
      email=models.EmailField(blank=True,default='@ub.ac.bw')
      mobile=models.CharField(max_length=10,blank=True)
      class Meta:
            abstract= True
#13.status(abstract): for computer devices
class Status(models.Model):#status abstract class
      operative=models.BooleanField(default=True)
      used=models.BooleanField(default=True)
      obsolete=models.BooleanField(default=False)
      sold=models.BooleanField(default=False)
      loanable=models.BooleanField(default=False)
      class Meta:
            abstract= True
#14.CPU
class CPU(models.Model):
      make_choices=(
            ('Intel','Intel'),
            ('AMD', 'AMD'),
            ('Other','Other')
      )
      cpu_make=models.CharField(max_length=10,choices=make_choices,default='Intel',blank=False)
      cpu=models.CharField(max_length=20,unique=True,blank=False)
      def __str__(self):
          return  '%s  %s' % (self.cpu_make,self.cpu)

#15.Location
class Location(models.Model):# Office space table
      description=models.CharField(max_length=30)
      block=models.ForeignKey(Building,on_delete=models.CASCADE)
      office=models.IntegerField(validators=[MinValueValidator(1),MaxValueValidator(100)],blank=True,null=True)
      spacecode=models.CharField(max_length=15,unique=True,blank=True,null=True)
      def __str__(self):
            return '%s/%s ( %s )' %(self.block,self.office,self.description)
      class Meta:
            unique_together = ['block','office']
#16.DType,lookup for device types
class DType(models.Model):
      dtype = models.CharField(max_length=30,unique=True,primary_key=True)
      def __str__(self):
              return self.dtype

#######################################################################################
#                    MAIN TABLES                                                      #
#######################################################################################
#17. Custodian 
#18. Project
#19. Asset
#20. Computer_Unit(abstract model for computers)
#21. Desktop
#22. Laptop
#23. Server
#24. Display
#25. Printer
#26  Scanner
#27. Projector
#28. Mobile
#29. Other_Asset
#30.Loan
#######################################################################################

#17. Custodian
class Custodian(Contacts):
       title_choices=(
            ('Mr','Mr'),
            ('Ms','Ms'),
            ('Mrs','Mrs'),
             ('Dr','Dr'),
            ('Professor','Professor'),
            ('-','-')
            )
       type_choices=(
		("Academic","Academic"),
                ("Support","Support"),
		("Student","Student"),
		)
       username = models.CharField(max_length=30,unique=True,null=False)
       title=models.CharField(max_length=30,choices=title_choices,default='-')
       firstname=models.CharField(max_length=30)
       surname=models.CharField(max_length=30)
       type=models.CharField(max_length=20,choices=type_choices,default="Academic")
       current=models.BooleanField(default=True)
       faculty = models.CharField(max_length=20,default="ORI")
       division =models.ForeignKey(Division,on_delete=models.CASCADE)
       def __str__(self):
            return '%s %s %s' % (self.surname, self.firstname,self.title)
       class Meta:
             ordering =["surname"]
       def  dept(self):
            return  self.division.name
#18. Project
class Project(models.Model):
      project_name =models.CharField(max_length=30)
      p_cordinator=models.ForeignKey(Custodian,on_delete=models.CASCADE,blank=True,null=True)
      start_date = models.DateField(blank=True,null=True)
      end_date = models.DateField(blank=True,null=True)

      p_captured =  models.DateField(default = datetime.date.today)
      def __str__(self):
            return ' %s %s' % (self.project_name, self.p_cordinator)

#19.Asset
class Asset(Status,models.Model):
      category =models.ForeignKey(DType,on_delete=models.CASCADE)
      acode = models.CharField(max_length=7,unique=True,blank=True,null=True)
      sno  = models.CharField(max_length=50,unique=True,blank=True,null=True)
      asset_custodian=models.ForeignKey(Custodian,on_delete=models.SET_NULL,blank=True,null=True)
      asset_project = models.ForeignKey(Project,on_delete=models.SET_NULL,blank=True,null=True)
      office =models.ForeignKey(Location,on_delete=models.SET_NULL,blank=True,null=True)
      comments=models.CharField(max_length=70,blank=True)
      date_issued=models.DateField(null=True,blank=True)
      date_captured=models.DateField(default=datetime.date.today,null=True,blank=True)
      comments=models.CharField(max_length=100,blank=True,default=None)
      def __str__(self):
            return '%s %s %s %s %s' % (self.acode,self.sno, self.category,self.asset_custodian,self.office)
      #def unit(self):
            #return self.asset_custodian.dept


#20.Computer_Unit(for desktop,Laptops,Servers)shorthand
class Computer_Unit(models.Model):
      drive_choices = (
			('250GB','250GB'),
			('500GB','500GB'),
                        ('1TB','1TB'),
			('2TB','2TB'),
			('3TB','3TB'),
			('4TB','4TB'),
			)
      operating_system = models.ForeignKey(OSSystem,on_delete=models.CASCADE,blank=True,null=True)
      processor = models.ForeignKey(CPU,on_delete=models.CASCADE,blank=True,null=True)
      speed = models.DecimalField(decimal_places=2,max_digits=4,blank=True,null=True)
      ram = models.IntegerField(validators=[MinValueValidator(1),MaxValueValidator(32)],blank=True,null=True)
      drive_size = models.CharField(max_length=30,choices=drive_choices,default="500GB")
      class Meta:
            abstract=True
#21. Desktop/Workstation
class Desktop(Asset,Computer_Unit,models.Model):
      factor_choices= (
                      ('SFF','SFF'),
                      ('Tower','Tower'),
                      ('Mini','Mini PC'),
                      ('al-in-one',"All-In-One"),
                      ('other','Other')
                      )
      form_factor = models.CharField(max_length=30,choices=factor_choices,default="SFF") 
      desktop_mmodel = models.ForeignKey(Computer_Model,on_delete=models.CASCADE,limit_choices_to={'c_type':'Desktop'})
      def acode(self): 
         return self.asset_ptr.acode
      def serial_no(self):
          return self.asset_ptr.sno
      def description(self):
          return self.asset_ptr.category
      def location(self):
          return self.asset_ptr.office
      def user(self):
          return self.asset_ptr.asset_custodian
      #def faculty(self):
      #    return self.asset_ptr.asset_custodian.division

      #Asset._meta.get_field('description').default='Computer'
      def __init__(self, *args, **kwargs):
         self._meta.get_field('category').default="Desktop"
         super(Asset, self).__init__(*args, **kwargs)
#22.Laptop
class Laptop(Asset,Computer_Unit,models.Model):
      lap_choices=(
            ('laptop','Laptop'),
            ('mini','Mini Laptop'),
            ('Tablet','Tablet')
            )
      laptop_type=models.CharField(max_length=30,choices=lap_choices,default='Laptop')
      laptop_mmodel = models.ForeignKey(Computer_Model,on_delete=models.CASCADE,limit_choices_to={'c_type': 'Laptop'})
      laptop_size = models.IntegerField(validators=[MinValueValidator(5),MaxValueValidator(50)],blank=True,null=True)     
      def acode(self):
         return self.asset_ptr.acode
      def serial_no(self):
          return self.asset_ptr.sno
      def description(self):
          return self.asset_ptr.category
      def location(self):
          return self.asset_ptr.office
      def user(self):
          return self.asset_ptr.asset_custodian
      '''
      def clean(self):
          category = self.asset_ptr.category
          if category != "Laptop":
                 raise ValidationError(
                 _('%(value)s is not a valid category'),
                 params={'value': category},
            )
      '''
      def __init__(self, *args, **kwargs):
         self._meta.get_field('category').default="Laptop"
         super(Asset, self).__init__(*args, **kwargs) 

#23.Server
class Server(Asset,Computer_Unit,models.Model):
      server_factor= (
                      ('Tower','Tower'),
                      ('rack-Mount','rack-mount'),
                      ('blade','blade'),
                      )
      form_factor = models.CharField(max_length=30,choices=server_factor,default="rack-mount")
      server_mmodel = models.ForeignKey(Computer_Model,on_delete=models.CASCADE,limit_choices_to={'c_type':'server'})
      operating_system = models.ForeignKey(OSSystem,on_delete=models.CASCADE,limit_choices_to={'os_type':'server'},blank=True,null=True)
      raid = models.IntegerField(validators=[MinValueValidator(1),MaxValueValidator(10)],blank=True,null=True)
      fqdn = models.CharField(max_length=30,blank=True)
      server_ip =models.GenericIPAddressField(null=True)
      DHCP=models.BooleanField(default=False)
      DNS=models.BooleanField(default=False)
      File=models.BooleanField(default=False)
      DHCP=models.BooleanField(default=False)
      decomissioned=models.BooleanField(default=False)
      roles= models.CharField(max_length=100,blank=True)
      
      def acode(self):
         return self.asset_ptr.acode
      def serial_no(self):
          return self.asset_ptr.sno
      def description(self):
          return self.asset_ptr.category
      def location(self):
          return self.asset_ptr.office
      def user(self):
          return self.asset_ptr.asset_custodian.division.division
      def __init__(self, *args, **kwargs):
         self._meta.get_field('category').default = "Server"
         super(Asset, self).__init__(*args, **kwargs)
#24 Display
class Monitor(Asset,Status,models.Model):
      monitor_choice =(
            ('CRT Monitor','CRT Monitor'),
            ('LCD Monitor','LCD Monitor'),
            ('LED Monitor','LED Monitor')
            )
      monitor_type=models.CharField(max_length=15,default='LCD Monitor',choices=monitor_choice)
      monitor_model=models.ForeignKey(Display_Model,on_delete=models.SET_NULL,blank=True,null=True)
      monitor_project = models.ForeignKey(Project,on_delete=models.SET_NULL,blank=True,null=True)
      def __init__(self, *args, **kwargs):
         self._meta.get_field('category').default = "Display"
         super(Asset, self).__init__(*args, **kwargs)
#25.Printer
class Printer(Asset,Status,models.Model):
      use_choices=(
                  ('local','local'),
                  ('shared','shared'),
                  ('network','network')
                  )
      color_choices=( 
                   ('color', 'color'),
                   ('monochrome','monochrome')
                   )
      usage =models.CharField(max_length=15,choices=use_choices,default='local')
      printer_pmodel = models.ForeignKey (Printer_Model,on_delete=models.PROTECT,default=1) 
      color =models.CharField(max_length=15,choices=color_choices,default='monochrome')
      def __init__(self, *args, **kwargs):          
         self._meta.get_field('category').default = "Printer"
         super(Asset, self).__init__(*args, **kwargs)
      def acode(self):
         return self.asset_ptr.acode
      def serial_no(self):
          return self.asset_ptr.sno
      def description(self):
          return self.asset_ptr.category
      def location(self):
          return self.asset_ptr.office
      def user(self):
          return self.asset_ptr.asset_custodian

#26.Scanner
class Scanner(Asset,models.Model):
      type_choices = (
                     ('flatbed','flatbed'),
                     ('feeder','feeder'),
                      )

      scanner_type=models.CharField(max_length=30,choices=type_choices,default='flatbed')
      scanner_model=models.ForeignKey(Scanner_Model,on_delete=models.CASCADE)
      def acode(self):
         return self.asset_ptr.acode
      def serial_no(self):
          return self.asset_ptr.sno
      def description(self):
          return self.asset_ptr.category
      def location(self):
          return self.asset_ptr.office
      def user(self):
          return self.asset_ptr.asset_custodian

      def __init__(self, *args, **kwargs):
         self._meta.get_field('category').default="Scanner"
         super(Asset, self).__init__(*args, **kwargs)
#27.Projector
class Projector(Asset,models.Model):
      type_choices = (
                     ('LCD','LCD'),
                     ('LED','LED'),
                      )

      projector_type=models.CharField(max_length=30,choices=type_choices,default='LED')
      projector_model=models.ForeignKey(Projector_Model,on_delete=models.CASCADE)
      def acode(self):
         return self.asset_ptr.acode
      def serial_no(self):
          return self.asset_ptr.sno
      def description(self):
          return self.asset_ptr.category
      def location(self):
          return self.asset_ptr.office
      def user(self):
         return self.asset_ptr.asset_custodian
      def __init__(self, *args, **kwargs):
         self._meta.get_field('category').default = "Projector"
         super(Asset, self).__init__(*args, **kwargs)

#28.Mobile
class Phone(Status,models.Model):
    mb_acode=models.CharField(max_length=7,blank=True,unique=True)
    IMEI=models.CharField(max_length=20,blank=True,unique=True,null=True)   
    mb_make=models.ForeignKey(Mobile_Make,on_delete=models.CASCADE)
    mb_model =models.CharField(max_length=25,blank=True)
    mb_custodian=models.ForeignKey(Custodian,on_delete=models.SET_NULL,blank=True,null=True)
    mb_project = models.ForeignKey(Project,on_delete=models.SET_NULL,blank=True,null=True)    
    mb_comments=models.CharField(max_length=100,blank=True)
    def __str__(self):
            return ' %s %s %s %s %s' % (self.mb_acode, self.IMEI,self.mb_make,self.mb_model,self.mb_custodian)  
#Other_Asset
class Other_Asset(Asset):
      om_make=models.ForeignKey(Computer_Make,on_delete=models.CASCADE,blank=True,null=True)
      om_model=models.CharField(max_length=100,blank=True)
      def acode(self):
         return self.asset_ptr.acode
      def serial_no(self):
          return self.asset_ptr.sno
      def description(self):
          return self.asset_ptr.category
      def location(self):
          return self.asset_ptr.office
      def user(self):
         return self.asset_ptr.asset_custodian
#30.Loan
class Loan(models.Model):
      device=models.ForeignKey(Asset,on_delete=models.CASCADE,limit_choices_to={'loanable':True})
      #loaned_asset =models.ForeignKey(Asset,on_delete=models.CASCADE,default=73)
      loanee = models.ForeignKey(Custodian,on_delete=models.DO_NOTHING)
      date_loaned=models.DateField(default=datetime.date.today,null=True,blank=True)
      date_returned=models.DateField(null=True,blank=True)
      reason=models.CharField(max_length=100,blank=True)
      def ub_code(self):
          return self.device.acode
      def serial(self):
          return self.device.sno
      def device_type(self):
          return self.device.category

      def __str__(self):
            return ' %s %s' % (self.device, self.loanee)


####################################################################################################
#Temporary class for obsolete equip
class  Obsolete(models.Model):
       device=(
                ('---','---'),
                ('Desktop','Desktop'),
                ('Server','Server'),
                ('Display','Display'),
                ('Printer','Printer'),
                ('Scanner','Scanner'),
                ('Projector','Projector'),
                ('Switch','Switch'),
                ('TV','TV'),
                ('board','board'),
                ('other','other')
                    )

       status_choices =(
                         ('working ','working'),
                         ('not working','not working'),
                          )
       acode=models.CharField(max_length=7,blank=True,null=True,unique=True)
       sno= models.CharField(max_length=30,blank=True,null=True,unique=True)
       device= models.CharField(max_length=30,choices=device,default='---')
       make_model=models.CharField(max_length=30,blank=True)
       price = models.DecimalField(decimal_places=2,max_digits=5,blank=True,null=True,default=50.00)
       status=models.CharField(max_length=20,choices=status_choices,default='not working')
       registered=models.BooleanField(default=False)
       location=models.CharField(max_length=30)








