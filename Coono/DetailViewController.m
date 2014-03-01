//
//  DetailViewController.m
//  Coono
//
//  Created by K on 9/02/14.
//  Copyright (c) 2014 koumei.net. All rights reserved.
//

#import "DetailViewController.h"
#import <QuartzCore/QuartzCore.h>
#import "AppDelegate.h"

@interface DetailViewController ()
@property (strong, nonatomic) UIPopoverController *masterPopoverController;
- (void)configureView;
@end

@implementation DetailViewController

#pragma mark - Managing the detail item

- (void)setDetailItem:(id)newDetailItem
{
    if (_detailItem != newDetailItem) {
        _detailItem = newDetailItem;
        
        // Update the view.
        [self configureView];
    }

    if (self.masterPopoverController != nil) {
        [self.masterPopoverController dismissPopoverAnimated:YES];
    }        
}

- (void)configureView
{
    // Update the user interface for the detail item.

    if (self.detailItem) {
        self.detailDescriptionLabel.text = [[self.detailItem valueForKey:@"timeStamp"] description];
        self.subject.text = [[self.detailItem valueForKey:@"cn_title"] description];
        self.textview.text = [[self.detailItem valueForKey:@"cn_content"] description];
    }
}

- (void)viewDidLoad
{
    [super viewDidLoad];
	// Do any additional setup after loading the view, typically from a nib.
    
    [[self.textview layer] setBorderColor:[[UIColor grayColor] CGColor]];
    [[self.textview layer] setBorderWidth:0.2];
    [[self.textview layer] setCornerRadius:5];
    [self.textview setText:@""];
    
    self.textview.delegate = self;
    
    UIGestureRecognizer *tap = [[UITapGestureRecognizer alloc] initWithTarget:self action:@selector(dismissKeyboard)];
    [self.view addGestureRecognizer:tap];
    
    [self configureView];
}

- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

#pragma mark - Split view

- (void)splitViewController:(UISplitViewController *)splitController willHideViewController:(UIViewController *)viewController withBarButtonItem:(UIBarButtonItem *)barButtonItem forPopoverController:(UIPopoverController *)popoverController
{
    barButtonItem.title = NSLocalizedString(@"My Coono", @"MyCoono");
    [self.navigationItem setLeftBarButtonItem:barButtonItem animated:YES];
    self.masterPopoverController = popoverController;
}

- (void)splitViewController:(UISplitViewController *)splitController willShowViewController:(UIViewController *)viewController invalidatingBarButtonItem:(UIBarButtonItem *)barButtonItem
{
    // Called when the view is shown again in the split view, invalidating the button and popover controller.
    [self.navigationItem setLeftBarButtonItem:nil animated:YES];
    self.masterPopoverController = nil;
}

- (IBAction)saveItem:(id)sender {
    NSManagedObjectContext *context = [self getManagedObjectContext];
    //NSEntityDescription *entity = [[self.fetchedResultsController fetchRequest] entity];
    NSManagedObject *newManagedObject = nil;
    
    if(self.detailItem != nil){
        newManagedObject = (NSManagedObject*) self.detailItem;
    }else{
        newManagedObject = [NSEntityDescription insertNewObjectForEntityForName:@"MyCoono" inManagedObjectContext:context];
    }
    
    // If appropriate, configure the new managed object.
    // Normally you should use accessor methods, but using KVC here avoids the need to add a custom class to the template.
    [newManagedObject setValue:[NSDate date] forKey:@"timeStamp"];
    [newManagedObject setValue:self.subject.text forKey:@"cn_title"];
    [newManagedObject setValue:self.textview.text forKey:@"cn_content"];
    
    // Save the context.
    NSError *error = nil;
    if (![context save:&error]) {
        // Replace this implementation with code to handle the error appropriately.
        // abort() causes the application to generate a crash log and terminate. You should not use this function in a shipping application, although it may be useful during development.
        NSLog(@"Unresolved error %@, %@", error, [error userInfo]);
        abort();
    }else{
        UIAlertView *alert = [[UIAlertView alloc]initWithTitle:@"Item saved" message:@"Item saved successfully." delegate:self cancelButtonTitle:@"Okay" otherButtonTitles:nil];
        [alert show];
    }
}

- (NSManagedObjectContext*) getManagedObjectContext{
    AppDelegate *appDelegate = [[UIApplication sharedApplication] delegate];
    return appDelegate.managedObjectContext;
    
}

- (void)textViewDidChange:(UITextView *)textView{

}

- (void)textViewDidEndEditing:(UITextView *)textView{
    if([self.subject.text isEqualToString:@""]){
        if([self.textview.text length] > 20){
            NSString *subjectTxt = [self.textview.text substringToIndex:20];
            subjectTxt = [subjectTxt stringByAppendingString:@"..."];
            self.subject.text = subjectTxt;
        }else{
            self.subject.text = self.textview.text;
        }
    }
}

-(void)dismissKeyboard {
    [self.textview resignFirstResponder];
}
@end
