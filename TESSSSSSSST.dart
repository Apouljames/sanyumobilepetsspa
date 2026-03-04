import 'package:flutter/material.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import 'package:mkm/core/constants/app_colors.dart';
import 'package:mkm/presentation/features/auth/providers/auth_providers.dart';
import 'package:mkm/presentation/providers/notification_providers.dart';
import 'package:mkm/presentation/providers/messaging_providers.dart' as messaging;
import 'package:mkm/presentation/features/leaderboard/screens/leaderboard_screen.dart';

/// Reusable AppDrawer widget for navigation sidebar
class AppDrawer extends ConsumerWidget {
  const AppDrawer({super.key});

  @override
  Widget build(BuildContext context, WidgetRef ref) {
    final authAsync = ref.watch(authStateProvider);
    final userAsync = ref.watch(currentUserProvider);

    return Drawer(
      child: SafeArea(
        child: Column(
          children: [
            // User Profile Section
            Container(
              padding: const EdgeInsets.all(16),
              decoration: BoxDecoration(
                color: AppColors.secondary,
                borderRadius: const BorderRadius.only(
                  bottomRight: Radius.circular(16),
                ),
              ),
              child: userAsync.when(
                data: (user) {
                  if (user == null) {
                    return const Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        CircleAvatar(
                          radius: 32,
                          backgroundColor: Colors.white,
                          child: Icon(Icons.person_rounded, size: 32, color: AppColors.secondary),
                        ),
                        SizedBox(height: 12),
                        Text('Guest User', style: TextStyle(color: Colors.white, fontSize: 18, fontWeight: FontWeight.bold)),
                      ],
                    );
                  }
                  
                  final fullName = '${user.firstName} ${user.lastName}'.trim();
                  final userType = user.isTeacher ? 'Teacher' : 'Student';
                  
                  return Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      // Profile Avatar with real image or initials
                      CircleAvatar(
                        radius: 32,
                        backgroundColor: Colors.white,
                        backgroundImage: user.profilePicture != null ? NetworkImage(user.profilePicture!) : null,
                        child: user.profilePicture == null
                            ? Text(
                                '${user.firstName.isNotEmpty ? user.firstName[0] : ''}${user.lastName.isNotEmpty ? user.lastName[0] : ''}'.toUpperCase(),
                                style: const TextStyle(fontSize: 24, fontWeight: FontWeight.bold, color: AppColors.secondary),
                              )
                            : null,
                      ),
                      const SizedBox(height: 12),
                      // User full name
                      Text(
                        fullName.isNotEmpty ? fullName : 'User',
                        style: const TextStyle(color: Colors.white, fontSize: 18, fontWeight: FontWeight.bold),
                        maxLines: 1,
                        overflow: TextOverflow.ellipsis,
                      ),
                      // User email
                      Text(
                        user.email,
                        style: const TextStyle(color: Colors.white70, fontSize: 12),
                        maxLines: 1,
                        overflow: TextOverflow.ellipsis,
                      ),
                      const SizedBox(height: 8),
                      // User type badge
                      Container(
                        padding: const EdgeInsets.symmetric(horizontal: 8, vertical: 4),
                        decoration: BoxDecoration(
                          color: Colors.white.withOpacity(0.2),
                          borderRadius: BorderRadius.circular(4),
                        ),
                        child: Text(
                          userType,
                          style: const TextStyle(color: Colors.white, fontSize: 11, fontWeight: FontWeight.w600),
                        ),
                      ),
                      // Verified badge if applicable
                      if (user.isVerified)
                        Padding(
                          padding: const EdgeInsets.only(top: 8),
                          child: Row(
                            mainAxisSize: MainAxisSize.min,
                            children: const [
                              Icon(Icons.verified_rounded, size: 14, color: Colors.white),
                              SizedBox(width: 4),
                              Text('Verified', style: TextStyle(color: Colors.white, fontSize: 11)),
                            ],
                          ),
                        ),
                    ],
                  );
                },
                loading: () => const Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    CircleAvatar(radius: 32, backgroundColor: Colors.white30),
                    SizedBox(height: 12),
                    SizedBox(
                      height: 20,
                      child: CircularProgressIndicator(
                        valueColor: AlwaysStoppedAnimation<Color>(Colors.white),
                        strokeWidth: 2,
                      ),
                    ),
                  ],
                ),
                error: (error, stackTrace) => const Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    CircleAvatar(
                      radius: 32,
                      backgroundColor: Colors.white,
                      child: Icon(Icons.person_rounded, size: 32, color: AppColors.secondary),
                    ),
                    SizedBox(height: 12),
                    Text('User Profile', style: TextStyle(color: Colors.white, fontSize: 16, fontWeight: FontWeight.bold)),
                  ],
                ),
              ),
            ),
            const SizedBox(height: 8),
            // Navigation Menu Items
            Expanded(
              child: userAsync.when(
                data: (user) => ListView(
                  padding: const EdgeInsets.symmetric(vertical: 8),
                  children: [
                    _buildDrawerItem(
                      icon: Icons.home_rounded,
                      title: 'Home',
                      onTap: () {
                        Navigator.pop(context);
                        // Already on home
                      },
                    ),
                    _buildDrawerItem(
                      icon: Icons.newspaper_rounded,
                      title: 'News Feed',
                      onTap: () {
                        Navigator.pop(context);
                        Navigator.pushNamed(context, '/news');
                      },
                    ),
                    _buildDrawerItem(
                      icon: Icons.library_books_rounded,
                      title: 'Study Materials',
                      onTap: () {
                        Navigator.pop(context);
                        Navigator.pushNamed(context, '/materials');
                      },
                    ),
                    // Role-based items: Only show for badge teachers and admins
                    if (user != null && (user.isVerified || user.isAdmin))
                      _buildDrawerItem(
                        icon: Icons.add_circle_rounded,
                        title: 'Add Materials',
                        onTap: () {
                          Navigator.pop(context);
                          Navigator.pushNamed(context, '/add-materials');
                        },
                      ),
                    if (user != null && (user.isVerified || user.isAdmin))
                      _buildDrawerItem(
                        icon: Icons.newspaper_rounded,
                        title: 'Publish News',
                        onTap: () {
                          Navigator.pop(context);
                          Navigator.pushNamed(context, '/publish-news');
                        },
                      ),
                    // Admin-only items
                    if (user != null && user.isAdmin)
                      _buildDrawerItem(
                        icon: Icons.dashboard_rounded,
                        title: 'Admin Dashboard',
                        onTap: () {
                          Navigator.pop(context);
                          Navigator.pushNamed(context, '/admin-dashboard');
                        },
                      ),
                    _buildDrawerItem(
                      icon: Icons.notifications_rounded,
                      title: 'Notifications',
                      onTap: () {
                        Navigator.pop(context);
                        Navigator.pushNamed(context, '/notifications');
                      },
                      badge: Consumer(
                        builder: (context, ref, child) {
                          final unreadAsync = ref.watch(currentUserUnreadCountProvider);
                          return unreadAsync.when(
                            data: (count) => count > 0
                                ? Container(
                                    padding: const EdgeInsets.symmetric(
                                      horizontal: 8,
                                      vertical: 2,
                                    ),
                                    decoration: BoxDecoration(
                                      color: Colors.red,
                                      borderRadius: BorderRadius.circular(10),
                                    ),
                                    child: Text(
                                      count > 99 ? '99+' : count.toString(),
                                      style: const TextStyle(
                                        color: Colors.white,
                                        fontSize: 10,
                                        fontWeight: FontWeight.bold,
                                      ),
                                    ),
                                  )
                                : const SizedBox(),
                            loading: () => const SizedBox(),
                            error: (error, stackTrace) => const SizedBox(),
                          );
                        },
                      ),
                    ),
                    _buildDrawerItem(
                      icon: Icons.message_rounded,
                      title: 'Messages',
                      onTap: () {
                        Navigator.pop(context);
                        Navigator.pushNamed(context, '/messages');
                      },
                      badge: user != null
                          ? Consumer(
                              builder: (context, ref, child) {
                                final unreadAsync = ref.watch(
                                  messaging.totalUnreadCountProvider(user.id),
                                );
                                return unreadAsync.when(
                                  data: (count) => count > 0
                                      ? Container(
                                          padding: const EdgeInsets.symmetric(
                                            horizontal: 8,
                                            vertical: 2,
                                          ),
                                          decoration: BoxDecoration(
                                            color: Colors.red,
                                            borderRadius: BorderRadius.circular(10),
                                          ),
                                          child: Text(
                                            count > 99 ? '99+' : count.toString(),
                                            style: const TextStyle(
                                              color: Colors.white,
                                              fontSize: 10,
                                              fontWeight: FontWeight.bold,
                                            ),
                                          ),
                                        )
                                      : const SizedBox(),
                                  loading: () => const SizedBox(),
                                  error: (error, stackTrace) => const SizedBox(),
                                );
                              },
                            )
                          : null,
                    ),
                    _buildDrawerItem(
                      icon: Icons.group_rounded,
                      title: 'Groups',
                      onTap: () {
                        Navigator.pop(context);
                        Navigator.pushNamed(context, '/groups');
                      },
                    ),
                    // Group creation - only for badge teachers and admins
                    if (user != null && (user.isVerified || user.isAdmin))
                      _buildDrawerItem(
                        icon: Icons.add_circle_rounded,
                        title: 'Create Group',
                        onTap: () {
                          Navigator.pop(context);
                          Navigator.pushNamed(context, '/create-group');
                        },
                      ),
                    _buildDrawerItem(
                      icon: Icons.star_rounded,
                      title: 'Badges & Rewards',
                      onTap: () {
                        Navigator.pop(context);
                        Navigator.pushNamed(context, '/badge-application');
                      },
                    ),
                    _buildDrawerItem(
                      icon: Icons.trending_up_rounded,
                      title: 'Leaderboard',
                      onTap: () {
                        Navigator.pop(context);
                        Navigator.push(
                          context,
                          MaterialPageRoute(builder: (context) => const LeaderboardScreen()),
                        );
                      },
                    ),
                    const Divider(),
                    _buildDrawerItem(
                      icon: Icons.settings_rounded,
                      title: 'Settings',
                      onTap: () {
                        Navigator.pop(context);
                        Navigator.pushNamed(context, '/settings');
                      },
                    ),
                    _buildDrawerItem(
                      icon: Icons.help_rounded,
                      title: 'Help & Support',
                      onTap: () {
                        Navigator.pop(context);
                        // TODO: Navigate to help
                      },
                    ),
                  ],
                ),
                loading: () => const Center(
                  child: CircularProgressIndicator(),
                ),
                error: (error, stackTrace) => const SizedBox(),
              ),
            ),
            // Logout Button
            Padding(
              padding: const EdgeInsets.all(16),
              child: SizedBox(
                width: double.infinity,
                child: ElevatedButton.icon(
                  icon: const Icon(Icons.logout_rounded),
                  label: const Text('Logout'),
                  style: ElevatedButton.styleFrom(
                    backgroundColor: Colors.red,
                    foregroundColor: Colors.white,
                  ),
                  onPressed: () {
                    Navigator.pop(context);
                    _showLogoutDialog(context, ref);
                  },
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }

  Widget _buildDrawerItem({
    required IconData icon,
    required String title,
    required VoidCallback onTap,
    Widget? badge,
  }) {
    return ListTile(
      leading: Icon(icon, color: AppColors.secondary),
      title: Text(
        title,
        style: const TextStyle(color: AppColors.grey900),
      ),
      trailing: badge,
      onTap: onTap,
      shape: RoundedRectangleBorder(
        borderRadius: BorderRadius.circular(8),
      ),
      hoverColor: AppColors.grey100,
    );
  }

  void _showLogoutDialog(BuildContext context, WidgetRef ref) {
    showDialog(
      context: context,
      builder: (context) => AlertDialog(
        title: const Text('Logout'),
        content: const Text('Are you sure you want to logout?'),
        actions: [
          TextButton(
            onPressed: () => Navigator.pop(context),
            child: const Text('Cancel'),
          ),
          TextButton(
            onPressed: () async {
              Navigator.pop(context);
              try {
                await ref.read(authRepositoryProvider).logout();
                if (context.mounted) {
                  Navigator.of(context).pushReplacementNamed('/splash');
                }
              } catch (e) {
                if (context.mounted) {
                  ScaffoldMessenger.of(context).showSnackBar(
                    SnackBar(content: Text('Logout failed: $e')),
                  );
                }
              }
            },
            child: const Text('Logout', style: TextStyle(color: Colors.red)),
          ),
        ],
      ),
    );
  }
}
