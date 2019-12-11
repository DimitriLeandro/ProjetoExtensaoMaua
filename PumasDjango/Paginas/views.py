from django.http import HttpResponse
from django.shortcuts import render

# Create your views here.
def homeView(request, *args, **kwargs):
	return render(request, "home.html", {})