//
//  DetailViewController.m
//  Coono
//
//  Created by K on 9/02/14.
//  Copyright (c) 2014 koumei.net. All rights reserved.
//

#import "DetailViewController.h"
#import <QuartzCore/QuartzCore.h>

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
