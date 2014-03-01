//
//  DetailViewController.h
//  Coono
//
//  Created by K on 9/02/14.
//  Copyright (c) 2014 koumei.net. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface DetailViewController : UIViewController <UISplitViewControllerDelegate,UITextViewDelegate>

@property (weak, nonatomic) IBOutlet UITextField *subject;
@property (strong, nonatomic) id detailItem;
@property (weak, nonatomic) IBOutlet UITextView *textview;

@property (weak, nonatomic) IBOutlet UILabel *detailDescriptionLabel;
- (IBAction)saveItem:(id)sender;
@end
