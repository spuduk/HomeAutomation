import xbmc, xbmcgui, os


dialog = xbmcgui.Dialog()
i = dialog.ok("Prevent Shutdown?","","                       Shutdown will occur in 10mins.","                        Press 'OK' to cancel Shutdown.")

if i == 10:
        dialog.ok("Error", "Shutdown may Still occur.")
else:
        os.system("sudo shutdown -c")

